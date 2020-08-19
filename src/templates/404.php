<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Fritz's Wieners theme
 */
 
get_header(); ?>

  <div id='standardPage'>
  
    <div class='center-content red-bg'>  
      <h1 class='animate__animated animate__pulse not-in-image'>404 - PAGE NOT FOUND</h1>
    </div>
  
    <div class='container center-content'>
      <div class='row'>
        <div class='col'>        
            <content>
              <p>We're sorry, that page URL can't be found. Please use the menu to find where you want to go, or <a style='color:#c8102e;' href='<?php get_template_directory_uri(); ?>'>return home</a>.
            </content>
        </div>
      </div>
    </div>

  </div>

<?php get_footer(); ?>