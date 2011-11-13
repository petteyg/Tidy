<?php
class TidyComponent extends Component {
	function initialize(&$controller) {
	}
	function startup(&$controller) {
	}
	function beforeRender(&$controller) {
	}
	function shutdown(&$controller) {
		$config = array('indent' => TRUE,
				'output-xhtml' => TRUE,
				'wrap' => 200);

		$tidy = tidy_parse_string($controller->response->body(), $config, 'UTF8');

		$tidy->cleanRepair();
		$controller->response->body($tidy);
	}
}
