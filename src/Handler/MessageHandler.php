<?php declare(strict_types=1);
/**
 * MessageHandler
 * @package CleverMonitor\CleverAIMTM\Handler
 * @author Jan Žahourek <jan.zahourek@clevermonitor.com>
 * @created 27.02.2019 11:22
 */

namespace CleverMonitor\CleverAIMTM\Handler;


use CleverMonitor\CleverAIMTM\Connection\Result\Result;
use CleverMonitor\CleverAIMTM\Connection\Result\ResultInterface;
use CleverMonitor\CleverAIMTM\Object\Paginator\Paginator;
use CleverMonitor\CleverAIMTM\Object\Paginator\PaginatorInterface;

class MessageHandler extends HandlerAbstract {

	/**
	 * @param PaginatorInterface|null|Paginator $paginator
	 * @param string $sortField
	 * @param string $sortDirection
	 * @param array $filter
	 * @return ResultInterface|Result
	 */
	public function getOverview(PaginatorInterface $paginator = null, $sortField = 'messageId', $sortDirection = 'ASC', $filter = []): ResultInterface {
		$body = [
			'sorter' => [
				'field' => $sortField,
				'direction' => $sortDirection
			]
		];

		if ($paginator) {
			$page = [
				'length' => $paginator->getLength()
			];

			if($paginator->getOffset() !== null) {
				$page['offset'] = $paginator->getOffset();
			} else {
				$page['page'] = $paginator->getPage();
			}

			$body['paginator'] = $page;
		}

		if (!empty($filter)) {
			$body['filter'] = $filter;
		}

		return $this->getClientForApi()->post('tm/overview', $body);
	}

	/**
	 * Detail of message
	 * @param string $id
	 * @return ResultInterface|Result
	 */
	public function getDetail(string $id): ResultInterface {
		return $this->getClientForApi()->get(sprintf('tm/%s/detail', $id));
	}
}
