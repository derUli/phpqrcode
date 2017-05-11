<?php
class QRCodeController extends Controller {
	public function outputPNG() {
		$text = Request::getVar ( "text" );
		header ( "Content-Type: image/png" );
		QRcode::png ( $text );
		exit ();
	}
	public function embedPNG($text) {
		echo "<img src=\"index.php?sClass=QRCodeController&sMethod=outputPNG&text=" . htmlspecialchars ( $text ) . "\" alt=\"" . htmlspecialchars ( $text ) . "\">";
	}
}