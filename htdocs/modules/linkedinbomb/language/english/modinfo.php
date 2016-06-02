<?php

	// application
	define('_MI_LINKEDIN_NAME','Linked-IN Bomb');
	define('_MI_LINKEDIN_DESCRIPTION','Linked-IN Bomb is a marketing leads generation tool for XOOPS');
	define('_MI_LINKEDIN_DIRNAME','linkedinbomb');
	
	//Preferences
	define('_MI_LINKEDIN_APP_KEY','Linked-in Application Key - <a href="https://www.linkedin.com/secure/developer">Get Key</a>');
	define('_MI_LINKEDIN_APP_KEY_DESC','This is the main application key for OAuth');
	define('_MI_LINKEDIN_APP_SECRET','Linked-in Application Secret - <a href="https://www.linkedin.com/secure/developer">Get Secret</a>');
	define('_MI_LINKEDIN_APP_SECRET_DESC','This is the main application secret for OAuth');
	define('_MI_LINKEDIN_CALLBACK_URL','Your site callback URL');
	define('_MI_LINKEDIN_CALLBACK_URL_DESC','Change this if your callback url is SEO or somewhere different than default otherwise don\'t change if your unsure.');
	define('_MI_LINKEDIN_CRAWLNEXT','Crawl next');
	define('_MI_LINKEDIN_CRAWLNEXT_DESC','Number of seconds to wait before an item is crawled again!');
	define('_MI_LINKEDIN_LIMIT_ON_CRAWL','Limit on number of person to crawl');
	define('_MI_LINKEDIN_LIMIT_ON_CRAWL_DESC','0 = Unlimited. Maximum number of people to crawl per session!');
	define('_MI_LINKEDIN_CRAWL_SORT','Crawl Sort');
	define('_MI_LINKEDIN_CRAWL_SORT_DESC','This is the sort method for the crawl');
	define('_MI_LINKEDIN_CRAWL_ORDER','Crawl Sort Order');
	define('_MI_LINKEDIN_CRAWL_ORDER_DESC','This is the order of the crawling sort order');
	define('_MI_LINKEDIN_USER_AGENT','Application Useragent');
	define('_MI_LINKEDIN_USER_AGENT_DESC','This is the application Useragent with CURL');
	define('_MI_LINKEDIN_CURL_CONNECT_TIMEOUT','CURL Connection Timeout');
	define('_MI_LINKEDIN_CURL_CONNECT_TIMEOUT_DESC','This is how many second CURL waits to connect via DNS');
	define('_MI_LINKEDIN_CURL_TIMEOUT','CURL Response Timeout');
	define('_MI_LINKEDIN_CURL_TIMEOUT_DESC','This is how many seconds CURL waits for a response.');
	define('_MI_LINKEDIN_BITLY_USERNAME','bit.ly Username');
	define('_MI_LINKEDIN_BITLY_USERNAME_DESC','This is your bit.ly Username for shortening URLS');
	define('_MI_LINKEDIN_BITLY_APIKEY','bit.ly API Key');
	define('_MI_LINKEDIN_BITLY_APIKEY_DESC','This is your bit.ly API Key');
	define('_MI_LINKEDIN_BITLY_APIURL','bit.ly API Url');
	define('_MI_LINKEDIN_BITLY_APIURL_DESC','This is the URL for the bit.ly API (Don\'t change)');
	define('_MI_LINKEDIN_CRONTYPE','Cron Execution Type');
	define('_MI_LINKEDIN_CRONTYPE_DESC','This is how the cron is executed!');
	define('_MI_LINKEDIN_CRONTYPE_PRELOADER','Executed via Preloader');
	define('_MI_LINKEDIN_CRONTYPE_CRONTAB','Executed via UNIX Cron Job');
	define('_MI_LINKEDIN_CRONTYPE_SCHEDULER','Executed via Windows Scheduler');
	define('_MI_LINKEDIN_INTERVAL_OF_CRON','Interval of cron');
	define('_MI_LINKEDIN_INTERVAL_OF_CRON_DESC','This is the number seconds a cron will be executed on, generally the interval of the cron is set by this.');
	define('_MI_LINKEDIN_LENGTH_OF_CRON','Length of cron');
	define('_MI_LINKEDIN_LENGTH_OF_CRON_DESC','This is the number seconds a cron will be executed for, interval of the cron is a basis of this variable which should be less.');
	define('_MI_LINKEDIN_CRON_CRAWL','Support Profile Crawling Cron');
	define('_MI_LINKEDIN_CRON_CRAWL_DESC','When turned on the crawling cron will run');
	define('_MI_LINKEDIN_SALT','Blowfish Encrytion Salt');
	define('_MI_LINKEDIN_SALT_DESC','Do not change on production machine, this is the salt for encryption and ciphers');
	define('_MI_LINKEDIN_ODDS_LOWER','When odds are lower than this number then it is tails of the odd');
	define('_MI_LINKEDIN_ODDS_LOWER_DESC','When a random is choosen when the number is lower than this it is a tails odd');
	define('_MI_LINKEDIN_ODDS_HIGHER','When odds are higher than this number then it is heads of the odd');
	define('_MI_LINKEDIN_ODDS_HIGHER_DESC','When a random is choosen when the number is higher than this it is a heads odd');
	define('_MI_LINKEDIN_ODDS_MINIMUM','The minimum number odds are pulled from');
	define('_MI_LINKEDIN_ODDS_MINIMUM_DESC','When alot a random this is the minimum number used');
	define('_MI_LINKEDIN_ODDS_MAXIMUM','The maximum number odds are pulled from');
	define('_MI_LINKEDIN_ODDS_MAXIMUM_DESC','When alot a random this is the maximum number used');
	define('_MI_LINKEDIN_HTACCESS','Enabled .htaccess SEO');
	define('_MI_LINKEDIN_HTACCESS_DESC','Turn on when you have placed the redirection text in .htaccess in '.XOOPS_ROOT_PATH);
	define('_MI_LINKEDIN_BASEURL','Base of URL');
	define('_MI_LINKEDIN_BASEURL_DESC','This is the base of the URL for SEO');
	define('_MI_LINKEDIN_ENDOFURL','End of URL for HTML');
	define('_MI_LINKEDIN_ENDOFURL_DESC','This is what the URL ends with for HTML Pages');
	define('_MI_LINKEDIN_ENDOFURLRSS','End of URL for RSS Feeds');
	define('_MI_LINKEDIN_ENDOFURLRSS_DESC','This is what the URL ends with for RSS XML Feeds');
	define('_MI_LINKEDIN_TIME_30MINUTES','30 minutes');
	define('_MI_LINKEDIN_TIME_1HOURS','1 hour');
	define('_MI_LINKEDIN_TIME_2HOURS','2 hours');
	define('_MI_LINKEDIN_TIME_3HOURS','3 hours');
	define('_MI_LINKEDIN_TIME_6HOURS','6 hours');
	define('_MI_LINKEDIN_TIME_12HOURS','12 hours');
	define('_MI_LINKEDIN_TIME_24HOURS','24 hours');
	define('_MI_LINKEDIN_TIME_1WEEK','7 days');
	define('_MI_LINKEDIN_TIME_FORTNIGHT','2 weeks');
	define('_MI_LINKEDIN_TIME_1MONTH','4 weeks');
	define('_MI_LINKEDIN_TIME_2MONTHS','2 months');
	define('_MI_LINKEDIN_TIME_3MONTHS','3 months');
	define('_MI_LINKEDIN_TIME_4MONTHS','4 months');
	define('_MI_LINKEDIN_TIME_5MONTHS','5 months');
	define('_MI_LINKEDIN_TIME_6MONTHS','6 months');
	define('_MI_LINKEDIN_TIME_12MONTHS','12 months');
	define('_MI_LINKEDIN_TIME_24MONTHS','24 months');
	define('_MI_LINKEDIN_CRAWL_SORT_RANDOM','Random Sort');
	define('_MI_LINKEDIN_CRAWL_SORT_CREATED','Creation date/time');
	define('_MI_LINKEDIN_CRAWL_SORT_UPDATED','Updated date/time');
	define('_MI_LINKEDIN_CRAWL_SORT_POLLED','Polled date/time');
	define('_MI_LINKEDIN_CRAWL_SORT_CRAWLED','Crawled date/time');
	define('_MI_LINKEDIN_CRAWL_ORDER_ASC','Ascending');
	
	// Global Messages
	define('_MI_LINKEDIN_NO_EMAIL_ADDRESS_WITH_USER','You have no email account associated with your username and password, you will need to specify one now!');
	
	// Admin Menu
	define('_MI_LINKEDINBOMB_TITLE_ADMENU0','Dashboard');
	define('_MI_LINKEDINBOMB_ICON_ADMENU0','../../Frameworks/moduleclasses/icons/32/home.png');
	define('_MI_LINKEDINBOMB_LINK_ADMENU0','admin/dashboard.php');
	define('_MI_LINKEDINBOMB_TITLE_ADMENU1','Persons');
	define('_MI_LINKEDINBOMB_ICON_ADMENU1','images/icons/linkedinbomb.person.png');
	define('_MI_LINKEDINBOMB_LINK_ADMENU1','admin/persons.php');
	define('_MI_LINKEDINBOMB_TITLE_ADMENU2','Profiles');
	define('_MI_LINKEDINBOMB_ICON_ADMENU2','images/icons/linkedinbomb.profiles.png');
	define('_MI_LINKEDINBOMB_LINK_ADMENU2','admin/profiles.php');
	define('_MI_LINKEDINBOMB_TITLE_ADMENU3','Internal Messaging');
	define('_MI_LINKEDINBOMB_ICON_ADMENU3','images/icons/linkedinbomb.messaging.png');
	define('_MI_LINKEDINBOMB_LINK_ADMENU3','admin/messaging.php');
	define('_MI_LINKEDINBOMB_TITLE_ADMENU4','Email Messaging');
	define('_MI_LINKEDINBOMB_ICON_ADMENU4','images/icons/linkedinbomb.email.png');
	define('_MI_LINKEDINBOMB_LINK_ADMENU4','admin/email.php');
	define('_MI_LINKEDINBOMB_TITLE_ADMENU5','Instant Messaging');
	define('_MI_LINKEDINBOMB_ICON_ADMENU5','images/icons/linkedinbomb.im.png');
	define('_MI_LINKEDINBOMB_LINK_ADMENU5','admin/im.php');
	define('_MI_LINKEDINBOMB_TITLE_ADMENU6','Phone & SMS');
	define('_MI_LINKEDINBOMB_ICON_ADMENU6','images/icons/linkedinbomb.phones.png');
	define('_MI_LINKEDINBOMB_LINK_ADMENU6','admin/phone.php');
	define('_MI_LINKEDINBOMB_TITLE_ADMENU7','Twitter');
	define('_MI_LINKEDINBOMB_ICON_ADMENU7','images/icons/linkedinbomb.twitter.png');
	define('_MI_LINKEDINBOMB_LINK_ADMENU7','admin/twitter.php');
	define('_MI_LINKEDINBOMB_TITLE_ADMENU8','About');
	define('_MI_LINKEDINBOMB_ICON_ADMENU8','../../Frameworks/moduleclasses/icons/32/about.png');
	define('_MI_LINKEDINBOMB_LINK_ADMENU8','admin/about.php');
	
?>
	