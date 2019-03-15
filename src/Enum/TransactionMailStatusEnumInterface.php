<?php declare(strict_types=1);
/**
 * TransactionMailStatusEnumInterface
 * @package CleverMonitor\CleverAIMTM\Enum
 * @author Jan Žahourek <jan.zahourek@clevermonitor.com>
 * @created 27.02.2019 11:16
 */

namespace CleverMonitor\CleverAIMTM\Enum;


interface TransactionMailStatusEnumInterface {
	/** TM received from client */
	const RECEIVED = 'RECEIVED';
	/** TM was sent */
	const SENT = 'SENT';
	/** TM was opened */
	const OPENED = 'OPENED';
	/** TM was clicked through */
	const CLICKED = 'CLICKED';
	/** TM was bounced */
	const BOUNCED = 'BOUNCED';
	/** TM resulted in error */
	const ERROR = 'ERROR';
}

