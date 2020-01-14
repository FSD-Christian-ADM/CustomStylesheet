<?php

	class CustomStylesheetPlugin extends MantisPlugin {


		public function register() {

			$this->name = 'Custom Stylesheet';
			$this->description = 'Add individual CSS file for additional styling';
			$this->page = 'config';

			$this->version = '0.1';
			$this->requires = array(
				'MantisCore' => '2.0.0'
			);

			$this->author = 'Christian Schulz';
			$this->contact = 'christian.schulz@fsd-web.de';
			$this->url = '';
		}

		public function init() {


		}


		public function hooks() {
			return array(
				'EVENT_LAYOUT_RESOURCES'	=> 'load_custom_css'
			);
		}



		public function load_custom_css() {

			$resources = "";

			$custom_css_path = plugin_config_get("custom_css_path", "");

			if(is_file($custom_css_path)) {
				$resources .= '<link rel="stylesheet" type="text/css" href="'.$custom_css_path.'"/>';
			}

			return $resources;

		}


	}