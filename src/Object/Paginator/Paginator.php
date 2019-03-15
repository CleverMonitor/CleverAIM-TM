<?php declare(strict_types=1);
/**
 * Paginator
 * @package CleverMonitor\CleverAIMTM\Object\Paginator
 * @author Jan Žahourek <jan.zahourek@clevermonitor.com>
 * @created 27.02.2019 17:30
 */

namespace CleverMonitor\CleverAIMTM\Object\Paginator;


class Paginator implements PaginatorInterface {
	/**
	 * @var int
	 */
	protected $offset = null;

	/**
	 * @var int
	 */
	protected $length = 20;

	/**
	 * @var int
	 */
	protected $page = 1;

	/**
	 * @return int
	 */
	public function getOffset(): ?int {
		return $this->offset;
	}

	/**
	 * @param int $offset
	 * @return Paginator
	 */
	public function setOffset(int $offset): Paginator {
		$this->offset = $offset;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getLength(): int {
		return $this->length;
	}

	/**
	 * @param int $length
	 * @return Paginator
	 */
	public function setLength(int $length): Paginator {
		$this->length = $length;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getPage(): int {
		return $this->page;
	}

	/**
	 * @param int $page
	 * @return Paginator
	 */
	public function setPage(int $page): Paginator {
		$this->page = $page;
		return $this;
	}
}
