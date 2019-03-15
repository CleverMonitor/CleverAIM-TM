<?php declare(strict_types=1);
/**
 * Client
 * @package CleverMonitor\CleverAIMTM\Connection
 * @author Jan Žahourek <jan.zahourek@clevermonitor.com>
 * @created 26.02.2019 16:42
 */

namespace CleverMonitor\CleverAIMTM\Connection;

use CleverMonitor\CleverAIMTM\Connection\Result\Result;
use CleverMonitor\CleverAIMTM\Connection\Result\ResultInterface;
use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\ResponseInterface;

class Client {

	/**
	 * @var string
	 */
	protected $baseUrl;

	/**
	 * @var string
	 */
	protected $token;

	/**
	 * @var GuzzleClient
	 */
	protected $client;

	/**
	 * Client constructor.
	 * @param string $token
	 * @param string $baseUrl
	 */
	public function __construct(string $token, string $baseUrl) {
		$this->token = $token;
		$this->baseUrl = $baseUrl;
	}

	/**
	 * Create Guzzle Http client
	 * @return GuzzleClient
	 */
	public function create(): Client {
		$this->client = new GuzzleClient([
			'base_uri' => $this->baseUrl,
			'timeout' => 100,
			'verify' => false,
			'headers' => [
				'Accept' => 'application/json',
				'Authorization' => sprintf('Bearer %s', $this->token)
			],
			'http_errors' => false
		]);
		return $this;
	}

	/**
	 * GET
	 * @param string $uri
	 * @param array $query
	 * @return Result
	 */
	public function get(string $uri, array $query = []): Result {
		$query = !empty($query) ? '?' . http_build_query($query) : null;
		$response = $this->client->request('GET', $uri . $query);
		return $this->responseHandle($response);
	}

	/**
	 * POST
	 * @param string $uri
	 * @param array $data
	 * @return Response
	 */
	public function post(string $uri, array $data): Result {
		$response = $this->client->request('POST', $uri, ['json' => $data]);
		return $this->responseHandle($response);
	}

	/**
	 * PATCH
	 * @param string $uri
	 * @param array $data
	 * @return Result
	 */
	public function patch(string $uri, array $data): Result {
		$response = $this->client->request('PATCH', $uri, ['json' => $data]);
		return $this->responseHandle($response);
	}

	/**
	 * PUT
	 * @param string $uri
	 * @param array $data
	 * @return Result
	 */
	public function put(string $uri, array $data): Result {
		$response = $this->client->request('PUT', $uri, ['json' => $data]);
		return $this->responseHandle($response);
	}

	/**
	 * DELETE
	 * @param string $uri
	 * @param array $data
	 * @return Result
	 */
	public function delete(string $uri, array $data): Result {
		$response = $this->client->request('DELETE', $uri, ['json' => $data]);
		return $this->responseHandle($response);
	}

	/**
	 * Handle response and return result object
	 * @param ResponseInterface $response
	 * @return ResultInterface|Result
	 */
	public function responseHandle(ResponseInterface $response): ResultInterface {
		$result = new Result();
		$result->setStatusCode((int) $response->getStatusCode());
		$result->setContent((string) $response->getBody());
		$result->setHeaders($response->getHeaders());
		return $result;
	}
}
