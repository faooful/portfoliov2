<?php 

function getOrientation($imageSrc) {

    list($width, $height) = getimagesize("$imageSrc");  // get image size

    if( $width > $height ) {   
        return 'landscape';
    }
    else if( $width < $height ) {
        return 'portrait';
    }
    else {
        return 'square';
    }  
}

?>
