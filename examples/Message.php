<?php

/**
 * CleverMonitor Developers
 *
 * CleverAIM TM API SDK
 * Message
 *
 * @author CleverMonitor <support@clevermonitor.com>
 */

require __DIR__ . '/../vendor/autoload.php';

use \CleverMonitor\CleverAIMTM\Connection\ClientFactory;
use CleverMonitor\CleverAIMTM\Handler\MessageHandler;
use \CleverMonitor\CleverAIMTM\Object\Paginator\Paginator;
use CleverMonitor\CleverAIMTM\Enum\TransactionMailStatusEnumInterface as TMStatus;

/**
 * Create Client Factory
 */
$clientFactory = new ClientFactory('your-token');

/**
 * Message View
 */
$messageHandler = new MessageHandler($clientFactory);

/**
 * Get Message Overview
 */
$paginator = new Paginator();
$paginator->setOffset(0);
$paginator->setLength(20);

/**
 * Filter
 * Query: (status = 'SENT' OR status = 'RECIEVED' OR status = 'CLICKED' OR status = 'OPENED') AND messageId != 'my-message-id'
 */
$filter = [
	"and" => [
		[
			'or' => [
				[
					"field" => [
						"status" => [
							"EQ" => TMStatus::SENT
						]
					]
				],
				[
					"field" => [
						"status" => [
							"EQ" => TMStatus::RECEIVED
						]
					]
				],
				[
					"field" => [
						"status" => [
							"EQ" => TMStatus::CLICKED
						]
					]
				],
				[
					"field" => [
						"status" => [
							"EQ" => TMStatus::OPENED
						]
					]
				]
			]
		],
		[
			'or' => [
				[
					"field" => [
						"messageId" => [
							"NEQ" => 'my-message-id'
						]
					]
				]
			]
		]
	]
];

$result = $messageHandler->getOverview($paginator, 'messageId', 'ASC');

$httpResponseCode = $result->getStatusCode();
$httpResponseData = $result->getData();
$httpResponseErrors = $result->getErrors();

print_r($httpResponseCode);
print_r($httpResponseData);
print_r($httpResponseErrors);

/**
 * Get Message Detail
 */
$result = $messageHandler->getDetail('c5dde719-c196-45b4-85b5-0aa7f9b03e5c');


$httpResponseCode = $result->getStatusCode();
$httpResponseData = $result->getData();
$httpResponseErrors = $result->getErrors();

print_r($httpResponseCode);
print_r($httpResponseData);
print_r($httpResponseErrors);
