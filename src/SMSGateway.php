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
	function send($msg, $sender, array $to, $transactional = true);
	
	
		
	/**
	 * Send SMS to a lot of recipients (this is more optimized that calling `send` with a big array of recipients)
	 *
	 * @param string $msg 
	 * @param string $sender
	 * @param string[] $to Big array of recipients, numbers in international format +xxyyyyyyyyyyyyy (ex. +33612345678)
	 * @param bool $transactional True if message sent is transactional ; otherwise it's promotional)
	 * @return int Returns the number of SMS sent (a multi-sms message count as as many message)
	 */
	function bulkSend($msg, $sender, array $to, $transactional = true);
	
	
	
	/**
	 * Send SMS to a lot of recipients by downloading a CSV file
	 *
	 * @param string $msg 
	 * @param string $sender
	 * @param string $url Url of CSV file with recipients, numbers in international format +xxyyyyyyyyyyyyy (ex. +33612345678), first row is column headers (1 column title 'Number')
	 * @param bool $transactional True if message sent is transactional ; otherwise it's promotional)
	 * @return int Returns the number of SMS sent (a multi-sms message count as as many message)
	 */
	function bulkSendFromHttp($msg, $sender, $url, $transactional = true);	
}


?>