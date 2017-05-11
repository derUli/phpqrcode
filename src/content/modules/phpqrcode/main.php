<?php
function phpqrcode_render() {
	$controller = controllerRegistry::get ( "QRCodeController" );
	$text = CustomData::getCustomDataOrSetting ( "phpqrcode_text" );
	if (! StringHelper::isNullOrWhitespace ( $text )) {
		$text = "";
	}
	
	ob_start ();
	$controller->embedPNG ( $text );
	return ob_get_clean ();
}
