<?php


namespace Nettools\SMS;



/**
 * Interface for sending SMS through several gateways
 */
interface SMSGateway {

	/**
	 * Send SMS to several recipients
	 *
	 * @param string $msg Message to send
	 * @param string $sender Sender id
	 * @param string[] $to Array of recipients
	 * @param bool $transactional True if message sent is transactional ; otherwise it's promotional)
	 * @return int Returns the number of messages sent, usually the number of values of $to parameter (a multi-sms message count as 1 message)
	 */
	function send($msg, $sender, array $to, $nostop = true);
}


?>