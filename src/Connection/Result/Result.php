<?php declare(strict_types=1);
/**
 * Result
 * @package CleverMonitor\CleverAIMTM\Connection
 * @author Jan Žahourek <jan.zahourek@clevermonitor.com>
 * @created 26.02.2019 16:52
 */

namespace CleverMonitor\CleverAIMTM\Connection\Result;

class Result implements ResultInterface {

	/**
	 * @var int
	 */
	protected $statusCode;

	/**
	 * @var array
	 */
	protected $content;

	/**
	 * @var array
	 */
	protected $headers;

	/** --- Setters --jz- */

	/**
	 * @param string $content
	 * @return ResultInterface
	 */
	public function setContent(string $content): ResultInterface {
		$this->content = json_decode($content, true, 512, JSON_BIGINT_AS_STRING);
		return $this;
	}

	/**
	 * @param int $statusCode
	 * @return ResultInterface
	 */
	public function setStatusCode(int $statusCode): ResultInterface {
		$this->statusCode = $statusCode;
		return $this;
	}

	/**
	 * @param array $headers
	 * @return ResultInterface
	 */
	public function setHeaders(array $headers): ResultInterface {
		$this->headers = $headers;
		return $this;
	}

	/** --- Getters --jz- */

	/**
	 * Returns response http status code
	 * @return int
	 */
	public function getStatusCode(): int {
		return $this->statusCode;
	}

	/**
	 * Returns response full body
	 * @return array
	 */
	public function getBody(): array {
		return $this->content;
	}

	/**
	 * Returns response data
	 * @return array
	 */
	public function getData(): array {
		return $this->content['data'] ?? $this->content;
	}

	/**
	 * Returns response errors
	 * @return array
	 */
	public function getErrors(): array {
		return $this->content['errors'] ?? [];
	}

	/**
	 * Returns response meta data
	 * @return array
	 */
	public function getMetaData(): array {
		return $this->content['metadata'] ?? [];
	}

	/**
	 * @return array
	 */
	public function getHeaders(): array {
		return $this->headers;
	}

	/**
	 * @return RateLimits
	 */
	public function getRateLimits(): RateLimits {
		return new RateLimits(
			current($this->getHeaders()['X-RateLimit-Limit']),
			current($this->getHeaders()['X-RateLimit-Remaining']),
			current($this->getHeaders()['X-RateLimit-Reset'])
		);
	}
}
