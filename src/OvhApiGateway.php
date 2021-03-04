<?php


namespace Nettools\SMS;


use \Nettools\Core\Misc\AbstractConfig;



/**
 * Classe to send SMS through OVH api
 */
class OvhApiGateway extends SMSGateway {

	protected $api;
	protected $config;
	
	
	
	/**
	 * Constructor
	 *
	 * @param \Ovh\Api $api API ovh
	 * @param \Nettools\Misc\AbstractConfig $config Config object
	 *
	 * $config must have values for :
	 * - service
	 */
	public function __construct(\Ovh\Api $api, AbstractConfig $config)
	{
		$this->api = $api;			
		$this->config = $config;
	}
	
	
	/**
	 * Send SMS to several recipients
	 *
	 * @param string $msg 
	 * @param string $sender
	 * @param string[] $to
	 * @param string $nostop 
	 * @return int Returns the number of messages sent, usually the number of values of $to parameter (a multi-sms message count as 1 message)
	 */
	function send($msg, $sender, $to, $nostop = true)
	{
		$service = $this->config->service;
		$ret = $this->api->post("/sms/$service/jobs", array(
				'message' 		=> $msg,
				'noStopClause'	=> $nostop,
				'sender'		=> $sender,
				'receivers'		=> $to
			));

		return count($ret['ids']);
	}
}


?>