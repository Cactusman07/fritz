/* bundle.js */

/* Main Menu logic */
if(!!document.getElementById('mainMenu')){
  jQuery(document).ready(
    () => {
    jQuery(document).delegate('.open, .cls', 'click', function(event){
      jQuery('.open').toggleClass('oppenned');
        event.stopPropagation();
    });
    jQuery(document).delegate('body', 'click', function(event) {
        jQuery('.open').removeClass('oppenned');
    });    
  });
}
