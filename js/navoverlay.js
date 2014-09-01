var navOverlay    = document.getElementById('nav-overlay');
var siteNavToggle = document.getElementById('site-nav-toggle');

navOverlay.addEventListener('click', function() {
    siteNavToggle.checked = false;
});