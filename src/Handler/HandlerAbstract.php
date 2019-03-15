<?php declare(strict_types=1);
/**
 * HandlerAbstract
 * @package CleverMonitor\CleverAIMTM\Handler
 * @author Jan Žahourek <jan.zahourek@clevermonitor.com>
 * @created 27.02.2019 11:18
 */

namespace CleverMonitor\CleverAIMTM\Handler;


use CleverMonitor\CleverAIMTM\Connection\Client;
use CleverMonitor\CleverAIMTM\Connection\ClientFactory;

abstract class HandlerAbstract {

	/**
	 * @var ClientFactory
	 */
	protected $clientFactory;

	/**
	 * @var null|Client
	 */
	protected $clientApi = null;

	/**
	 * @var null|Client
	 */
	protected $clientTM = null;

	/**
	 * HandlerAbstract constructor.
	 * @param ClientFactory $clientFactory
	 */
	public function __construct(ClientFactory $clientFactory) {
		$this->clientFactory = $clientFactory;
	}

	/**
	 * Get Client for API
	 * @return Client
	 */
	protected function getClientForApi(): Client {
		if($this->clientApi === null) {
			$this->clientApi = $this->clientFactory->createForApi();
		}
		return $this->clientApi;
	}

	/**
	 * Get Client For TM API
	 * @return Client
	 */
	protected function getClientForTM(): Client {
		if($this->clientTM === null) {
			$this->clientTM = $this->clientFactory->createForTM();
		}
		return $this->clientTM;
	}
}
