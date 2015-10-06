<?php
class JConfig {
	public function __construct() {
		$relationships = json_decode( base64_decode( $_ENV['PLATFORM_RELATIONSHIPS'] ), TRUE );

		$this->host = $relationships['database'][0]['host'];
		$this->user = $relationships['database'][0]['username'];
		$this->password = $relationships['database'][0]['password'];
		$this->db = $relationships['database'][0]['path'];
	}
	public $offline = '0';
	public $offline_message = 'This site is down for maintenance.<br /> Please check back again soon.';
	public $display_offline_message = '1';
	public $offline_image = '';
	public $sitename = 'Joomla!';
	public $editor = 'tinymce';
	public $captcha = '0';
	public $list_limit = '20';
	public $access = '1';
	public $debug = '0';
	public $debug_lang = '0';
	public $dbtype = 'mysql';
	public $host = '';
	public $user = '';
	public $password = '';
	public $db = '';
	public $dbprefix = 'joomla344_';
	public $live_site = '';
	public $secret = '1rGw1XX9aRSOGwZ6';
	public $gzip = '0';
	public $error_reporting = 'default';
	public $helpurl = 'https://help.joomla.org/proxy/index.php?option=com_help&keyref=Help{major}{minor}:{keyref}';
	public $ftp_host = '127.0.0.1';
	public $ftp_port = '21';
	public $ftp_user = '';
	public $ftp_pass = '';
	public $ftp_root = '';
	public $ftp_enable = '0';
	public $offset = 'UTC';
	public $mailonline = '1';
	public $mailer = 'mail';
	public $mailfrom = 'root@localhost';
	public $fromname = 'Joomla!';
	public $sendmail = '/usr/sbin/sendmail';
	public $smtpauth = '0';
	public $smtpuser = '';
	public $smtppass = '';
	public $smtphost = 'localhost';
	public $smtpsecure = 'none';
	public $smtpport = '25';
	public $caching = '0';
	public $cache_handler = 'file';
	public $cachetime = '15';
	public $MetaDesc = '';
	public $MetaKeys = '';
	public $MetaTitle = '1';
	public $MetaAuthor = '1';
	public $MetaVersion = '0';
	public $robots = '';
	public $sef = '1';
	public $sef_rewrite = '0';
	public $sef_suffix = '0';
	public $unicodeslugs = '0';
	public $feed_limit = '10';
	public $log_path = '/logs';
	public $tmp_path = '/tmp';
	public $lifetime = '15';
	public $session_handler = 'database';
}
