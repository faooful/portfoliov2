<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <link href="stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="stylesheets/magnific-popup.css" media="screen, projection" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/print.css" media="print" rel="stylesheet" type="text/css" />
    <!--[if IE]>
        <link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <![endif]-->

    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,700' rel='stylesheet' type='text/css'>
</head>

<body class="white">

<nav>
    <label for="site-nav-toggle" id="nav-button">
        <img class="burgericon" src="img/burgericon.png" alt="Burger icon"/>
    </label>
    <input type="checkbox" id="site-nav-toggle" class="checkbox-hack" autocomplete="off">
    <ul id="site-nav">
        <a href="https://invstr.com/index.html"><li>Home</li></a>
        <a href="https://invstr.com/static/theapp.html"><li>The App</li></a>
        <a href="https://invstr.com/static/aboutus.html"><li>About Us</li></a>
    </ul>
    <div id="nav-overlay"></div>
</nav>

<section class="section-padding align-center">
    <h1 class="black">Design</h1>
    <h2>Here is a collection of my Photoshop and Illustrator work</h2>
</section>


<div class="gallery align-center">
<!-- GALLERY -->

<?php

    $feed = simplexml_load_file('http://feed6.photobucket.com/albums/f83/faooful/img-gallery/feed.rss'); 
    $channel = $feed->channel;

    #LEFT
    echo '<div id="gallery-l"><div class="popup-gallery">';
    $i = 0;

    foreach($channel->item as $item):
        if ( $i %2 == 0 ) { 
            $i++;
                continue; 
            }
        $image = $item->children('media', true)->content->attributes()->url;
    $i++;
?>

<a href="<?= $image; ?>"><img src='<?= $image; ?>' alt=''/></a>

<?php endforeach;
    echo '</div></div>';

    #RIGHT
    echo '<div id="gallery-r"><div class="popup-gallery">';
    $i = 0;

    foreach($channel->item as $item):
        if ( $i %2 != 0 ) { 
            $i++;
                continue; 
            }
        $image = $item->children('media', true)->content->attributes()->url;
    $i++;
?>

<a href="<?= $image; ?>"><img src='<?= $image; ?>' alt=''/></a> 

<?php endforeach;
    echo '</div></div>';
?> 

<!-- GALLERY END -->
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="js/navoverlay.js"></script>

<script src="js/jquery.magnific-popup.min.js"></script> 
<script>
$(document).ready(function() {
  $('.popup-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },

    zoom: {
    enabled: true, // By default it's false, so don't forget to enable it

    duration: 200, // duration of the effect, in milliseconds
    easing: 'ease-in-out', // CSS transition easing function 

    // The "opener" function should return the element from which popup will be zoomed in
    // and to which popup will be scaled down
    // By defailt it looks for an image tag:
    opener: function(openerElement) {
      // openerElement is the element on which popup was initialized, in this case its <a> tag
      // you don't need to add "opener" option if this code matches your needs, it's defailt one.
      return openerElement.is('img') ? openerElement : openerElement.find('img');
    }
  },

    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
      titleSrc: function(item) {
        return '<small>by Joseph Williams</small>';
      }
    }
  });
});
</script>

<script src="js/showhide.js"></script>
<script>
$(document).ready(function(){

   $('.show_hide').showHide({
        speed: 1000,  // speed you want the toggle to happen
        easing: '',  // the animation effect you want. Remove this line if you dont want an effect and if you haven't included jQuery UI
        changeText: 1, // if you dont want the button text to change, set this to 0
        showText: 'MENU',// the button text to show when a div is closed
        hideText: 'CLOSE' // the button text to show when a div is open
    }); 
});
</script>

</body>

</html>