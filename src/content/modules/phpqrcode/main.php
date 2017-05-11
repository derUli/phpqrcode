<?php
function phpqrcode_render(){
    ob_start();
    QRcode::png	( "Hello World!" );
    return ob_get_clean();
}
