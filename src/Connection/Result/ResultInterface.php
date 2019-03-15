<?php declare(strict_types=1);
/**
 * ResponseInterface
 * @package CleverMonitor\CleverAIMTM\Connection\Response
 * @author Jan Žahourek <jan.zahourek@clevermonitor.com>
 * @created 27.02.2019 10:58
 */

namespace CleverMonitor\CleverAIMTM\Connection\Result;

interface ResultInterface {

	/**
	 * @param string $content
	 * @return ResultInterface
	 */
	public function setContent(string $content): ResultInterface;

	/**
	 * @param int $statusCode
	 * @return ResultInterface
	 */
	public function setStatusCode(int $statusCode): ResultInterface;

	/**
	 * @param array $headers
	 * @return ResultInterface
	 */
	public function setHeaders(array $headers): ResultInterface;
}
