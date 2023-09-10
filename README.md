# net-tools/sms

## Root composer library to send SMS through an host such as AWS SNS or OVH



## Setup instructions

To install net-tools/sms package, just require it through composer : `require net-tools/sms:^1.0.0`.

Don't forget to append the real implementation : `require net-tools/sms-aws:^1.0.0` or `require net-tools/sms-ovh:^1.0.0`




## How to use ?

This project makes it possible to send SMS through AWS SNS or OVH provider

```php

// create the $snsclient ; please refer to AWS API reference to see how to create the client

// creating config ; actual parameters vary along providers
$config = new \Nettools\Core\Misc\ObjectConfig((object)['sanitizeSenderId' => true]);

// create the api gateway
$gw = new Aws\ApiGateway($snsclient, $config);


// send a sms to several recipients, and this is a transactionnal message (last parameter set to True)
$gw->send('Appointment confirmed !', 'CLINIC', ['+XXYYYYYYYYY', '+XXZZZZZZZZZZ'], true);


// if there are many recipients, call bulkSend insted, with same parameters, as it's more optimized

```


The APIs supported are : AWS and OVH.




## PHPUnit

To test with PHPUnit, point the -c configuration option to the /phpunit.xml configuration file.

