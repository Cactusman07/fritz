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
                item.addClass('animate__flipInX');
                matchProductHeight();
              }, i * 150);
            });
            productContainer.addClass('has-animated');           
          }
        }
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

      checkScroll();
      jQuery(window).scroll(throttle(checkScroll, 100));
    
      /* Match height for products */
      const matchProductHeight = () => {
        jQuery('.product').matchHeight();
      }

      jQuery(window).resize(throttle(matchProductHeight, 100));
      jQuery(window).scroll(throttle(matchProductHeight, 200));
    }
  );
}