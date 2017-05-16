<?php
class QRCodeController extends Controller {
	private $moduleName = "phpqrcode";
	public function outputPNG() {
		$text = Request::getVar ( "text" );
		header ( "Content-Type: image/png" );
		QRcode::png ( $text );
		exit ();
	}
	public function embedPNG($text) {
		echo "<img src=\"index.php?sClass=QRCodeController&sMethod=outputPNG&text=" . htmlspecialchars ( $text ) . "\" alt=\"" . htmlspecialchars ( $text ) . "\">";
	}
	public function render() {
		$text = CustomData::getCustomDataOrSetting ( "phpqrcode_text" );
		if (StringHelper::isNullOrWhitespace ( $text )) {
			$text = "";
		}
		
		ob_start ();
		$this->embedPNG ( $text );
		return ob_get_clean ();
	}
	public function getSettingsHeadline() {
		return get_translation ( "PHP_QR_CODE" );
	}
	public function settings() {
		return Template::executeModuleTemplate ( $this->moduleName, "settings" );
	}
}