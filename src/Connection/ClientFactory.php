<?php declare(strict_types=1);
/**
 * ClientFactory
 * @package CleverMonitor\CleverAIMTM\Connection
 * @author Jan Žahourek <jan.zahourek@clevermonitor.com>
 * @created 26.02.2019 16:42
 */

namespace CleverMonitor\CleverAIMTM\Connection;


class ClientFactory {

	private const API_URL = "https://api.cleveraim.com/v1.0/";

	private const TM_URL = "https://transaction-api.cleveraim.com/v1.0/";

	/**
	 * @var string
	 */
	protected $apiUrl;

	/**
	 * @var string
	 */
	protected $tmUrl;

	/**
	 * @var string
	 */
	protected $token;

	/**
	 * ClientFactory constructor.
	 * @param string $token
	 * @param string $apiUrl
	 * @param string $tmUrl
	 */
	public function __construct(string $token, string $apiUrl = self::API_URL, string $tmUrl = self::TM_URL) {
		$this->token = $token;
		$this->apiUrl = $apiUrl;
		$this->tmUrl = $tmUrl;
	}

	/**
	 * @return Client
	 */
	public function createForApi(): Client {
		$client = new Client($this->token, $this->apiUrl);
		return $client->create();
	}

	/**
	 * @return Client
	 */
	public function createForTM(): Client {
		$client = new Client($this->token, $this->tmUrl);
		return $client->create();
	}
}
