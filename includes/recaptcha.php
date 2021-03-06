<?php
function pmpro_init_recaptcha()
{
	//don't load in admin
	if(is_admin())
		return;
	
	//use recaptcha?
	global $recaptcha;
	$recaptcha = pmpro_getOption("recaptcha");
	if($recaptcha)
	{
		global $recaptcha_publickey, $recaptcha_privatekey;
		if(!function_exists("recaptcha_get_html"))
		{
			require_once(PMPRO_DIR . "/includes/lib/recaptchalib.php");
		}
		$recaptcha_publickey = pmpro_getOption("recaptcha_publickey");
		$recaptcha_privatekey = pmpro_getOption("recaptcha_privatekey");
	}
}
add_action("init", "pmpro_init_recaptcha", 20);
