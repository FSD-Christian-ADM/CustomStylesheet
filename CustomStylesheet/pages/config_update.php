<?php

	require_once( 'core.php' );

	form_security_validate( 'configure_custom_stylesheet' );
	auth_reauthenticate( );
	access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );

	$custom_css_path = trim($_POST["custom_css_path"]);

	$css_path_check = config_get( 'core_path' )."../".$custom_css_path;

	if(is_file($css_path_check)) {

		plugin_config_set("custom_css_path", $custom_css_path);
		$_SESSION["custom_stylesheet_plugin_success"] = TRUE;

	} else {

		$_SESSION["custom_stylesheet_plugin_success"] = FALSE;
		$_SESSION["custom_stylesheet_plugin_retrace_form_custom_css_path"] = $custom_css_path;

	}



	form_security_purge( 'configure_custom_stylesheet' );
	print_successful_redirect( plugin_page( 'config', true ) );
