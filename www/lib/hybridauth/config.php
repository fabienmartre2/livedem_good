<?php

/**
 * HybridAuth
 * http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
 * (c) 2009-2015, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
 */
// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

return
		array(
			"base_url" => ADRESSE."lib/hybridauth/",
			"providers" => array(
				// openid providers
				"OpenID" => array(
					"enabled" => false
				),
				"Yahoo" => array(
					"enabled" => true,
					"keys" => array("key" => "dj0yJmk9blA5OHluQkx0SmxRJmQ9WVdrOVFsSTVkVTFYTlRJbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD03Mw--", "secret" => "fd98c4bc184309d25e4670dd4a65df1376e36e26"),
				),
				"AOL" => array(
					"enabled" => true
				),
				"Google" => array(
					"enabled" => true,
					"keys" => array("id" => "1079826877936-at7787ep3vj417phpqvjqv23dimo5mac.apps.googleusercontent.com", "secret" => "PtE5h0ouEOw-8_QQD-JyeO8x"),
				),
				"Facebook" => array(
					"enabled" => true,
					"keys" => array("id" => "534623930045360", "secret" => "2fe8a660dd9bae676e72bf349c78f0a0"),
					"trustForwarded" => false
				),
				"Twitter" => array(
					"enabled" => false,
					"keys" => array("key" => "", "secret" => ""),
					"includeEmail" => false
				),
				// windows live
				"Live" => array(
					"enabled" => true,
					"keys" => array("id" => "0000000048183E76", "secret" => "cH6fFq01R9BiOR1ZiXGBJyDymeC9PhoH")
				),
				"LinkedIn" => array(
					"enabled" => true,
					"keys" => array("key" => "", "secret" => "")
				),
				"Foursquare" => array(
					"enabled" => false,
					"keys" => array("id" => "", "secret" => "")
				),
			),
			// If you want to enable logging, set 'debug_mode' to true.
			// You can also set it to
			// - "error" To log only error messages. Useful in production
			// - "info" To log info and error messages (ignore debug messages)
			"debug_mode" => false,
			// Path to file writable by the web server. Required if 'debug_mode' is not false
			"debug_file" => "",
);
