<?php

define("PRODUCTION_MODE", false);
define("PROTOCOL", isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https://" : "http://");
define("SERVER_HOST", (isset($_SERVER["HTTP_X_FORWARDED_HOST"]) ? $_SERVER["HTTP_X_FORWARDED_HOST"] : $_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"] : $_SERVER["SCRIPT_NAME"]);
define("LOCAL_WEBSITE_DOMAIN", ["sustainedcare.build"]);

define("DOMAIN", in_array(SERVER_HOST, LOCAL_WEBSITE_DOMAIN) ? PROTOCOL.SERVER_HOST : $_ENV["LIVE_WEBSITE_DOMAIN"]);
define("CURRENT_URL", isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : "");
define("HTTP_REFERER", isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "");
define("PUBLIC_URL", DOMAIN."/public");
define("IMAGES_URL", DOMAIN."/public/images");
ini_set("session.referer_check", "TRUE");
define("SOFWARE_NAME", "SustainedCare Foundation");

define("LOCAL_DATABASE_HOST", "127.0.0.1");
define("LOCAL_DATABASE_NAME", "sustainedcare");
define("LOCAL_DATABASE_USERNAME", "root");
define("LOCAL_DATABASE_PASSWORD", "");
define("LOCAL_DATABASE_CHARSET", "UTF8");

define("LIVE_DATABASE_HOST", $_ENV["LIVE_DATABASE_HOST"]);
define("LIVE_DATABASE_NAME", $_ENV["LIVE_DATABASE_NAME"]);
define("LIVE_DATABASE_USERNAME", $_ENV["LIVE_DATABASE_USERNAME"]);
define("LIVE_DATABASE_PASSWORD", $_ENV["LIVE_DATABASE_PASSWORD"]);
define("LIVE_DATABASE_CHARSET", $_ENV["LIVE_DATABASE_CHARSET"]);

define("PAYSTACK_TEST_SECRET_KEY", "sk_test_86fb2e214e5abeab8d2a61b1a18917d26f341d4d");
define("PAYSTACK_TEST_PUBLIC_KEY", "pk_test_2fcf868912587055982ae0953facdace3fa9ac15");
define("PAYSTACK_LIVE_SECRET_KEY", $_ENV["PAYSTACK_LIVE_SECRET_KEY"]);
define("PAYSTACK_LIVE_PUBLIC_KEY", $_ENV["PAYSTACK_LIVE_PUBLIC_KEY"]);

define("PAYPAL_LIVE_CLIENT_ID", $_ENV["PAYPAL_LIVE_CLIENT_ID"]);
define("PAYPAL_LIVE_CLIENT_SECRET", $_ENV["PAYPAL_LIVE_CLIENT_SECRET"]);
define("PAYPAL_SANDBOX_CLIENT_ID", "AZAu8KyzQpoyEbnnS_s2BgZbgrQZ3pd0H-Npu1GRZ-AM4Bspu0yujf0LgzbBeSjFB4ggaBQGxGipvVzn");
define("PAYPAL_SANDBOX_CLIENT_SECRET", "EBHw0u9wDGk4nW2eKbdHng38CP4ZEAOduf3s0gLVYZNsy3Pr8pCfVbLfdwKRVcEajql63A6cSeV3RQMx");

define("COINPAYMENTS_PRIVATE_KEY", $_ENV["COINPAYMENTS_PRIVATE_KEY"]);
define("COINPAYMENTS_PUBLIC_KEY", $_ENV["COINPAYMENTS_PUBLIC_KEY"]);
define("COINPAYMENTS_MARCHANT_ID", $_ENV["COINPAYMENTS_MARCHANT_ID"]);
define("COINPAYMENTS_IPN_SECRET", $_ENV["COINPAYMENTS_IPN_SECRET"]);

define("REMEMBER_ME_COOKIE_EXPIRY", 3600 * 24 * 365); /** One Year **/
define("REMEMBER_ME_COOKIE_NAME", "__reh89hIteIHB7nb5yh3ufer7fad2q9yv98");
define("COOKIE_PATH", "/");
define("COOKIE_DOMAIN", "");
define("COOKIE_SECURE", false);
define("COOKIE_HTTP", false);
define("COOKIE_EXPIRY", 3600 * 24 * 15); /** 15 days **/

define("SESSION_COOKIE_NAME", "hjkrueihi548ysgnk3kdnbm,aoprgahit7483uj");
define("SESSION_COOKIE_EXPIRY", 3600 * 24 * 60); /** 60 Days **/
define("ENCRYPTION_KEY", "H43ag5js60z4D86tgEsh6w4e385Y");
define("REMEMBER_ME_SESSION_NAME", "4638295qgkh81y8qhrkngan8y4985ghnkjg");

define("REFERRAL_LINK_CODE_EXPIRY", 3600 * 24 * 90); /** 90 Days **/

define("ACCESS_DENIED_KEY", "672kbauh892ytqBGKA89jnbproeqnjhrwk017Ty89");
define("PAGINATION_DEFAULT_LIMIT", 30);

define('EMAIL_HOST', 'sustainedcare.org');
define('EMAIL_USERNAME', 'support@sustainedcare.org');
define('EMAIL_PASSWORD', '}06vh~@KUYiN');
define('EMAIL_SMTPSECURE', 'ssl');
define('EMAIL_PORT', 465);
define('EMAIL_FROM', 'support@sustainedcare.org');
define('EMAIL_FROM_NAME', 'SUSTAINEDCARE FOUNDATION');
define('EMAIL_REPLY_TO', 'support@sustainedcare.org');
define('EMAIL_DEBUG', 4);
define('EMAIL_AUTH', true);

define("EMAIL_VERIFICATION", 1);
define("EMAIL_VERIFICATION_SUBJECT", "EMAIL VERIFICATION");
define("EMAIL_VERIFICATION_URL", DOMAIN."/login/index");

define("PASSWORD_RESET", 2);
define("PASSWORD_RESET_SUBJECT", "PASSWORD RESET");
define("PASSWORD_RESET_URL", DOMAIN."/password/reset");

define("EMAIL_CONTACT", 3);
define("EMAIL_CONTACT_SUBJECT", "CONTACT FORM SUBMISSION");
