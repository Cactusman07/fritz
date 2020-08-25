/* bundle.js */

const jQuery = require('jquery');
const jQueryMatchHeight = require('jquery-match-height');

/* Main Menu logic */
if(!!document.getElementById('mainMenu')){
  jQuery(document).ready(
    () => {
    jQuery(document).delegate('.cls, #mainMenu', 'click', function(event){
      jQuery('#mainMenu').toggleClass('opened');
      event.stopPropagation();
    });
    jQuery('#menu-main-menu').click(function(event){
      event.stopPropagation();
    });
    jQuery(document).delegate('body', 'click', function(event) {
        jQuery('#mainMenu').removeClass('opened');
    });    
  });
}

const throttle = (callback, limit) => {
  let wait = false;
  return () => {
    if(!wait){
      callback.call();
      wait = true;
      setTimeout(function() {
        wait=false;
      }, limit);
    }
  }
}

// Scroll animation functions */
if(!!document.getElementById('productContainer')){
  jQuery(document).ready(
    () => {
      const productContainer = jQuery('#productContainer');
      const products = jQuery('.product');

      function isScrolledIntoView(element) {
        let docViewTop = jQuery(window).scrollTop();
        let docViewBottom = docViewTop + jQuery(window).height();

        let elementTop = jQuery(element).offset().top;
        let elementBottom = elementTop + jQuery(element).height();

        return ((elementBottom <= docViewBottom) && (elementTop >= docViewTop));
      }

      /* Check if element is scrolled into view */
      function checkScroll() {        
        if(productContainer.hasClass('has-animated')){
          return;
        } else {
          if(isScrolledIntoView(productContainer) === true) {
            products.each(function(i) {
              let item = jQuery(this);

              setTimeout(function() {
                item.removeClass('hidden');
                item.addClass('animate__animated');
                if(i < 3){
                  item.addClass('animate__fadeInLeft');
                } else {
                  item.addClass('animate__fadeInRight');
                }                
                matchProductHeight();
              }, i * 150);
            });
            productContainer.addClass('has-animated');           
          }
        }
      }

      checkScroll();
      jQuery(window).scroll(throttle(checkScroll, 100));
    
      /* Match height for products */
      const matchProductHeight = () => {
        products.matchHeight();
      }

      jQuery(window).resize(throttle(matchProductHeight, 100));
      jQuery(window).scroll(throttle(matchProductHeight, 200));
    }
  );
}

if(!!document.getElementById('bookingContainer')){
  jQuery(document).ready(
    () => {
    
      /* Match height for bookings */
      const matchBookingHeight = () => {
        jQuery('.booking-desc').matchHeight();
      }

      matchBookingHeight();
      jQuery(window).resize(throttle(matchBookingHeight, 100));

      /* Contact form(s) logic */
      const $aucklandLink = jQuery('#aucklandContact'),
            $christchurchLink = jQuery('#christchurchContact'),
            $dunedinLink = jQuery('#dunedinContact'),
            $hamiltonLink = jQuery('#hamiltonContact'),
            $wellingtonLink = jQuery('#wellingtonContact'),
            $brisbaneLink = jQuery('#brisbaneContact'),
            $goldCoastLink = jQuery('#goldCoastContact'),
            $melbourneLink = jQuery('#melbourneContact'),
            $sunshineCoastLink = jQuery('#sunshineCoastContact'),
            $sydneyLink = jQuery('#sydneyContact');

      const $popupFormHolder = jQuery('#popupForm'),
            $closePopup = jQuery('#close');

      const $aucklandForm = jQuery('#aucklandForm'),
            $christchurchForm = jQuery('#christchurchForm'),
            $dunedinForm = jQuery('#dunedinForm'),
            $hamiltonForm = jQuery('#hamiltonForm'),
            $wellingtonForm = jQuery('#wellingtonForm'),
            $brisbaneForm = jQuery('#brisbaneForm'),
            $goldCoastForm = jQuery('#goldCoastForm'),
            $melbourneForm = jQuery('#melbourneForm'),
            $sunshineCoastForm = jQuery('#sunshineCoastForm'),
            $sydneyForm = jQuery('#sydneyForm');

      $aucklandLink
      .add($christchurchLink)
      .add($dunedinLink)
      .add($hamiltonLink)
      .add($wellingtonLink)
      .add($brisbaneLink)
      .add($goldCoastLink)
      .add($melbourneLink)
      .add($sunshineCoastLink)
      .add($sydneyLink)
      .click(function(e) {
        e.preventDefault();
        $popupFormHolder.removeClass('hidden');
      });

      $aucklandLink.click(() => { $aucklandForm.removeClass('hidden'); });
      $christchurchLink.click(() => { $christchurchForm.removeClass('hidden'); });
      $dunedinLink.click(() => { $dunedinForm.removeClass('hidden'); });
      $hamiltonLink.click(() => { $hamiltonForm.removeClass('hidden'); });
      $wellingtonLink.click(() => { $wellingtonForm.removeClass('hidden'); });
      $brisbaneLink.click(() => { $brisbaneForm.removeClass('hidden'); });
      $goldCoastLink.click(() => { $goldCoastForm.removeClass('hidden'); });
      $melbourneLink.click(() => { $melbourneForm.removeClass('hidden'); });
      $sunshineCoastLink.click(() => { $sunshineCoastForm.removeClass('hidden'); });
      $sydneyLink.click(() => { $sydneyForm.removeClass('hidden'); });

      jQuery('.contact-form').click(function(event){
        event.stopPropagation();
      });

      $popupFormHolder.add($closePopup).click(function(){
        $popupFormHolder.addClass('hidden');
        $aucklandForm.addClass('hidden');
        $christchurchForm.addClass('hidden');
        $dunedinForm.addClass('hidden');
        $wellingtonForm.addClass('hidden');
        $hamiltonForm.addClass('hidden');
        $brisbaneForm.addClass('hidden');
        $goldCoastForm.addClass('hidden');
        $melbourneForm.addClass('hidden');
        $sunshineCoastForm.addClass('hidden');
        $sydneyForm.addClass('hidden');
      });
    } 
  );
}