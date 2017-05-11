<?php
function phpqrcode_render() {
	$text = CustomData::getCustomDataOrSetting ( "phpqrcode_text" );
	if (! StringHelper::isNullOrWhitespace ( $text )) {
		$text = "";
	}
	ob_start ();
	QRcode::png ( $text );
	return ob_get_clean ();
}
