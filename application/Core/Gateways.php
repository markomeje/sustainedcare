<?php

namespace Application\Core;
use Application\Exceptions\Logger;
use CoinPaymentsNet\CoinpaymentsAPI;
use Yabacon\Paystack;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use Stripe\Stripe;


class Gateways {


	public function coinpayment() {
		try {
	    	return new CoinpaymentsAPI(COINPAYMENTS_PRIVATE_KEY, COINPAYMENTS_PUBLIC_KEY, "json");
    	} catch(\Exception $error){
	        Logger::log("COINPAYMENTS API ERROR", $error->getMessage(), $error->getFile(), $error->getLine());
	        return false;
	    }
	}

	public function paystack() {
        try{
            return new Paystack(PAYSTACK_TEST_SECRET_KEY);
        } catch(\Exception $error){
            Logger::log("PAYSTACK API ERROR", $error->getMessage(), $error->getFile(), $error->getLine());
            return false;
        }
    }

    public function paypal() {
        try{
            $environment = new SandboxEnvironment(PAYPAL_SANDBOX_CLIENT_ID, PAYPAL_SANDBOX_CLIENT_SECRET);
            return new PayPalHttpClient($environment);
        } catch(\Exception $error){
            Logger::log("PAYPAL API ERROR", $error->getMessage(), $error->getFile(), $error->getLine());
            return false;
        }
    }

    public function stripe() {
        try{
            return new \Stripe\StripeClient(STRIPE_SECRET_TEST_KEY);
        } catch(\Exception $error){
            Logger::log("STRIPE API ERROR", $error->getMessage(), $error->getFile(), $error->getLine());
            return false;
        }
    }

    public function braintree() {
        try{
            $config = new \Braintree\Configuration(['environment' => 'sandbox', 'merchantId' => BRAINTREE_SANDBOX_MARCHANT_ID, 'publicKey' => BRAINTREE_SANDBOX_PUBLIC_KEY, 'privateKey' => BRAINTREE_SANDBOX_PRIVATE_KEY]);
            return new \Braintree\Gateway($config);
        } catch(\Exception $error){
            Logger::log("BRAINTREE API ERROR", $error->getMessage(), $error->getFile(), $error->getLine());
            return false;
        }
    }

}