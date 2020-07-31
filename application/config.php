<?php

define("PRODUCTION_MODE", false);
define("PROTOCOL", isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https://" : "http://");
define("SERVER_HOST", isset($_SERVER["HTTP_X_FORWARDED_HOST"]) ? $_SERVER["HTTP_X_FORWARDED_HOST"] : isset($_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"] : $_SERVER["SCRIPT_NAME"]);
define("LOCALHOSTS", ["127.0.0.1", "localhost", "127.0.0.1:8080"]);

in_array(SERVER_HOST, LOCALHOSTS) ? define("URL", "/sustainedcare") : define("URL", "");
define("DOMAIN", PROTOCOL.SERVER_HOST.URL);
define("CURRENT_URL", isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : "");
ini_set("session.referer_check", "TRUE");
define("HTTP_REFERER", isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "");
define("PUBLIC_URL", DOMAIN."/public");
define("IMAGES_URL", DOMAIN."/public/images");

define("SOFWARE_NAME", "sustainedcare");

define("LOCAL_DATABASE_HOST", "127.0.0.1");
define("LOCAL_DATABASE_NAME", "sustainedcare");
define("LOCAL_DATABASE_USERNAME", "root");
define("LOCAL_DATABASE_PASSWORD", "");
define("LOCAL_DATABASE_CHARSET", "UTF8");

foreach (["LIVE_DATABASE_HOST", "LIVE_DATABASE_NAME", "LIVE_DATABASE_USERNAME", "LIVE_DATABASE_PASSWORD", "LIVE_DATABASE_CHARSET"] as $CREDENTIAL) {
	define($CREDENTIAL, $_ENV[$CREDENTIAL]);
}

define("PAYSTACK_LIVE_SECRET_KEY", $_ENV["PAYSTACK_LIVE_SECRET_KEY"]);

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
define("EMAIL_VERIFICATION_URL", DOMAIN."login/index");

define("PASSWORD_RESET", 2);
define("PASSWORD_RESET_SUBJECT", "PASSWORD RESET");
define("PASSWORD_RESET_URL", DOMAIN."password/reset");
