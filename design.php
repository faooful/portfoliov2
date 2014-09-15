<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <link href="stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="stylesheets/magnific-popup.css" media="screen, projection" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/animate.css" media="screen, projection" rel="stylesheet" type="text/css" />
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
        <a href="http://www.faooful.com/index.html"><li>Home</li></a>
        <a href="http://www.faooful.com/web.html"><li>Web</li></a>
        <a href="http://www.faooful.com/design.php"><li>Design</li></a>
    </ul>
    <div id="nav-overlay"></div>
</nav>

<section class="section-padding align-center">
    <h1 class="black wow fadeInDown">Design</h1>
    <h2 class="wow fadeInDown">Here is a collection of my Photoshop and Illustrator work</h2>
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

<section class="section-padding align-center blue">
    <h1 class="wow fadeInDown">Contact</h1>
    <h2 class="align-centre wow fadeInDown">Got an idea or want to chat?</h2>
    <h2 class="wow fadeInDown"><a href="mailto:faooful@gmail.com">faooful@gmail.com</a></h2>
    <div id="twitter-wrapper wow fadeInDown">
        <a class="twitter-timeline" href="https://twitter.com/faooful" data-widget-id="491568533289963521" data-tweet-limit="1" data-chrome="noheader">Tweets by @faooful</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
    <div class="icon- social wow fadeInDown">
        <a href="https://www.linkedin.com/pub/joseph-williams/52/39a/3a9" target="_blank"><i class="linkedin">i</i></a>
        <a href="https://twitter.com/faooful" target="_blank"><i class="twitter">t</i></a>
        <a href="https://github.com/faooful" target="_blank"><i class="github">g</i></a>
        <a href="http://www.last.fm/user/faooful" target="_blank"><i class="lastfm">l</i></a>
    </div>
</section>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="js/navoverlay.js"></script>

<script src='js/wow.min.js'></script>
<script>
var wow = new WOW(
  {
    boxClass:     'wow',        // animated element css class (default is wow)
    animateClass: 'animated',   // animation css class (default is animated)
    offset:       500,          // distance to the element when triggering the animation (default is 0)
    mobile:       false        // trigger animations on mobile devices (true is default)
  }
);
new WOW().init();
</script>

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