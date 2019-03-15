<?php declare(strict_types=1);
/**
 * Message
 * @package CleverMonitor\CleverAIMTM\Object\Message
 * @author Jan Žahourek <jan.zahourek@clevermonitor.com>
 * @created 26.02.2019 16:19
 */

namespace CleverMonitor\CleverAIMTM\Object\Message;


class Message implements MessageInterface {
	/**
	 * @var string|null
	 */
	protected $subject = null;

	/**
	 * @var string|null
	 */
	protected $htmlBody = null;

	/**
	 * @var string|null
	 */
	protected $plainTextBody = null;

	/**
	 * @var array[email, name]
	 */
	protected $sender = [];

	/**
	 * @var array[email, name]
	 */
	protected $recipient = [];

	/**
	 * @var array
	 */
	protected $attachments = [];

	/**
	 * @var null
	 */
	protected $messageId = null;

	/** --- Setters --jz- */

	/**
	 * @param string $subject
	 * @return MessageInterface
	 */
	public function setSubject(string $subject): MessageInterface {
		$this->subject = $subject;
		return $this;
	}

	/**
	 * @param string $htmlBody
	 * @param string|null $plainTextBody
	 * @return MessageInterface
	 */
	public function setBody(string $htmlBody, string $plainTextBody = null): MessageInterface {
		$this->htmlBody = $htmlBody;
		$this->plainTextBody = $plainTextBody;
		return $this;
	}

	/**
	 * @param string $email
	 * @param string $name
	 * @return MessageInterface
	 */
	public function setSender(string $email, string $name): MessageInterface {
		$this->sender = [
			'email' => $email,
			'name' => $name
		];
		return $this;
	}

	/**
	 * @param string $email
	 * @param string $name
	 * @return MessageInterface
	 */
	public function setRecipient(string $email, string $name = null): MessageInterface {
		$this->recipient = $email;
//			[
//			'email' => $email,
//			'name' => $name
//		];
		return $this;
	}

	/**
	 * @param string $name
	 * @param string $content
	 * @return MessageInterface
	 */
	public function addAttachment(string $name, string $content): MessageInterface {
		$this->attachments[] = [
			'filename' => $name,
			'content' => base64_encode($content)
		];
		return $this;
	}

	/**
	 * @param null $messageId
	 */
	public function setMessageId($messageId): void {
		$this->messageId = $messageId;
	}

	/** --- Getters --jz- */

	/**
	 * @return null|string
	 */
	public function getSubject(): ?string {
		return $this->subject;
	}

	/**
	 * @return null|string
	 */
	public function getHtmlBody(): ?string {
		return $this->htmlBody;
	}

	/**
	 * @return null|string
	 */
	public function getPlainTextBody(): ?string {
		return $this->plainTextBody;
	}

	/**
	 * @return array
	 */
	public function getSender(): array {
		return $this->sender;
	}

	/**
	 * @return array
	 */
	public function getRecipient(): string {// array {
		return $this->recipient;
	}

	/**
	 * @return array
	 */
	public function getAttachments(): array {
		return $this->attachments;
	}

	/**
	 * @return string|null
	 */
	public function getMessageId(): ?string {
		return $this->messageId;
	}
}
