<?php declare(strict_types=1);
/**
 * PaginatorInterface
 * @package CleverMonitor\CleverAIMTM\Object\Paginator
 * @author Jan Žahourek <jan.zahourek@clevermonitor.com>
 * @created 27.02.2019 17:30
 */

namespace CleverMonitor\CleverAIMTM\Object\Paginator;


interface PaginatorInterface {
	/**
	 * @return int
	 */
	public function getOffset(): ?int;

	/**
	 * @return int
	 */
	public function getLength(): int;

	/**
	 * @return int
	 */
	public function getPage(): int;
}
