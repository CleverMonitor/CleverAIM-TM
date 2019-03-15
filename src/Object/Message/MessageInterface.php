<?php declare(strict_types=1);
/**
 * MessageInterface
 * @package CleverMonitor\CleverAIMTM\Object
 * @author Jan Žahourek <jan.zahourek@clevermonitor.com>
 * @created 26.02.2019 16:23
 */

namespace CleverMonitor\CleverAIMTM\Object\Message;


interface MessageInterface {
	/**
	 * @return null|string
	 */
	public function getSubject(): ?string;

	/**
	 * @return null|string
	 */
	public function getHtmlBody(): ?string;

	/**
	 * @return null|string
	 */
	public function getPlainTextBody(): ?string;

	/**
	 * @return array[email, name]
	 */
	public function getSender(): array;

	/**
	 * @return array[email, name]
	 */
	public function getRecipient(): string;//array;

	/**
	 * @return array
	 */
	public function getAttachments(): array;

	/**
	 * @return null|string
	 */
	public function getMessageId(): ?string;
}
