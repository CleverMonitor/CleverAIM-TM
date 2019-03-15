<?php declare(strict_types=1);
/**
 * RateLimits
 * @package CleverMonitor\CleverAIMTM\Connection
 * @author Jan Žahourek <jan.zahourek@clevermonitor.com>
 * @created 26.02.2019 16:57
 */

namespace CleverMonitor\CleverAIMTM\Connection\Result;


class RateLimits {
	/**
	 * Limit
	 * @var int
	 */
	protected $rateLimitLimit;

	/**
	 * Remaining
	 * @var int
	 */
	protected $rateLimitRemaining;

	/**
	 * Reset
	 * @var int
	 */
	protected $rateLimitReset;

	public function __construct(int $limit, int $reamining, int $reset) {
		$this->rateLimitLimit = $limit;
		$this->rateLimitRemaining = $reamining;
		$this->rateLimitReset = $reset;
	}

	/** --- Getters --jz- */

	/**
	 * The maximum number of requests you can make per 15 minutes window.
	 * @return int
	 */
	public function getLimit(): int {
		return $this->rateLimitLimit;
	}

	/**
	 * The number of requests remaining in the current rate limit window.
	 * @return int
	 */
	public function getRemaining(): int {
		return $this->rateLimitRemaining;
	}

	/**
	 * The number of seconds before the rate limit is reset.
	 * @return int
	 */
	public function getReset(): int {
		return $this->rateLimitReset;
	}
}
