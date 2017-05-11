<?php
define ( "MODULE_ADMIN_HEADLINE", get_translation ( "PHP_QR_CODE" ) );
function phpqrcode_admin() {
	if (get_request_method () == "POST" && Request::hasVar ( "phpqrcode_text" )) {
		Settings::set ( "phpqrcode_text", Request::getVar ( "phpqrcode_text" ), "str" );
	}
	$phpqrcode_text = Settings::get ( "phpqrcode_text" );
	?>
<form action="<?php echo ModuleHelper::buildAdminURL("phpqrcode");?>"
	method="post">
	<?php csrf_token_html();?>
	<?php
	if (get_request_method () == "POST" && Request::hasVar ( "phpqrcode_text" )) {
		?>
		
	<div class="alert alert-success alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<?php translate("changes_was_saved")?>
		</div>
		
	<?php
	}
	?>
	<p>
		<strong><?php translate("phpqrcode_text")?></strong> <br /> <input
			type="text" name="phpqrcode_text"
			value="<?php Template::escape($phpqrcode_text);?>"> <br />
	</p>
	<div class="row">
		<div class="col-xs-6">
			<button type="submit" class="btn btn-success"><?php translate("save");?></button>

		</div>

		<div class="col-xs-6 text-right"></div>
	</div>
	<h3><?php translate("preview");?></h3>
	<p><?php QRcode::png ( $phpqrcode_text ); ?></p>
</form>
<?php
}