<?php
/**
 * Created by PhpStorm.
 * User: jan
 * Date: 04.03.19
 * Time: 11:57
 */

namespace App\Service;


use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PayPalService
{
    /**
     * @var ApiContext
     */
    private $apiContext;

    public function __construct()
    {
        $apiContext = new ApiContext(
          new OAuthTokenCredential(
              getenv('PAYPAL_CLIENT_ID'),
              getenv('PAYPAL_SECRET')
          )
        );

        $apiContext->setConfig([
            'mode' => 'sandbox',
            'log.LogEnabled' => true,
            'log.FileName' => '../PayPal.log',
            'log.LogLevel' => 'DEBUG',
            'cache.enabled' => true,
            ]);

        $this->apiContext = $apiContext;

    }
}