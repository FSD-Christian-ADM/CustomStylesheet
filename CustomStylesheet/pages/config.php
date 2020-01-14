<?php

	auth_reauthenticate( );
	access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );

	layout_page_header( plugin_lang_get( 'title' ) );

	layout_page_begin( 'manage_overview_page.php' );
	print_manage_menu( 'manage_plugin_page.php' );

	$custom_css_path = plugin_config_get("custom_css_path", "");

?>



	<form method="post" action="<?php echo plugin_page('config_update') ?>">

		<?php echo form_security_field('configure_custom_stylesheet') ?>

		<h3>CSS path</h3>
		<i>relative to webroot</i>

		<?php

			if(isset($_SESSION["custom_stylesheet_plugin_success"]) && $_SESSION["custom_stylesheet_plugin_success"] === FALSE) {
				echo "<div style='font-weight:bold; color:red;'>Path not found";
				if(isset($_SESSION["custom_stylesheet_plugin_retrace_form_custom_css_path"])) {
					echo $_SESSION["custom_stylesheet_plugin_retrace_form_custom_css_path"];
				}
				echo "</div>";

				unset($_SESSION["custom_stylesheet_plugin_success"]);
				unset($_SESSION["custom_stylesheet_plugin_retrace_form_custom_css_path"]);

			}

			if(isset($_SESSION["custom_stylesheet_plugin_success"]) && $_SESSION["custom_stylesheet_plugin_success"] === TRUE) {
				echo "<div style='font-weight:bold; color:blue;'>saved!</div>";
			}

		?>


		<input id="custom_css_path" name="custom_css_path" type="text" title="path releative to webroot" value=" <?php echo $custom_css_path ?> " />


		<input type="submit" value="Save" />


	</form>





<?php


	layout_page_end();

