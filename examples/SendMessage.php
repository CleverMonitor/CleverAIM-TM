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
use \CleverMonitor\CleverAIMTM\Object\Message\Message;
use \CleverMonitor\CleverAIMTM\Handler\SendMessageHandler;

/**
 * Create Client Factory
 */
$clientFactory = new ClientFactory('your-token');

/**
 * Send transactional message
 */
$message = new Message();
$message->setSubject('Your mail subject');
$message->setSender('your@company.com', 'Your Company Name');
$message->setRecipient('john@doe.com');
$message->setBody('<html><body>Click on this <a href="http://your-website.com">link</a></body></html>');

$result = (new SendMessageHandler($clientFactory))->send($message);

$httpResponseCode = $result->getStatusCode();
$httpResponseData = $result->getData();
$httpResponseErrors = $result->getErrors();

print_r($httpResponseCode);
print_r($httpResponseData);
print_r($httpResponseErrors);
