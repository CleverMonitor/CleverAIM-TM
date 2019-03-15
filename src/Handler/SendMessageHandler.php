<?php declare(strict_types=1);
/**
 * SendMessageHandler
 * @package CleverMonitor\CleverAIMTM\Handler
 * @author Jan Žahourek <jan.zahourek@clevermonitor.com>
 * @created 27.02.2019 11:21
 */

namespace CleverMonitor\CleverAIMTM\Handler;


use CleverMonitor\CleverAIMTM\Connection\Result\Result;
use CleverMonitor\CleverAIMTM\Connection\Result\ResultInterface;
use CleverMonitor\CleverAIMTM\Object\Message\MessageInterface;

class SendMessageHandler extends HandlerAbstract {

	/**
	 * Send Message
	 * @param MessageInterface $message
	 * @return ResultInterface|Result
	 */
	public function send(MessageInterface $message): ResultInterface {
		$body = [
			'subject' => $message->getSubject(),
			'from' => $message->getSender(),
			'to' => $message->getRecipient(),
			'htmlBody' => $message->getHtmlBody(),
			'plainTextBody' => $message->getPlainTextBody()
		];

		if ($message->getMessageId()) {
			$body['messageId'] = $message->getMessageId();
		}

		if (!empty($message->getAttachments())) {
			$body['attachments'] = $message->getAttachments();
		}

		return $this->getClientForTM()->post('tm', $body);
	}
}
