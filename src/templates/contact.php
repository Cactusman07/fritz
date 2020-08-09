<?php

/**
 * The template for displaying The Contact us page
 *
 * Template Name: Contact us
 *
 * @package WordPress
 * @subpackage Fritz
 */

?>

<?php get_header(); ?>
<?php $imgUrl = get_the_post_thumbnail_url(); ?>

  <?php $menuLink = get_template_directory_uri() . '/menu'; ?>

  <div id='contactPage'>
  <?php if($imgUrl != '' || $imgUrl != null){ ?>
    <div id='imageHeader' style='background-image:url("<?php echo $imgUrl; ?>")'>
      <h1 class='animate__animated animate__pulse'><?php the_title(); ?></h1>
    </div>
  <?php } ?>

  <?php if(!($imgUrl != '' || $imgUrl != null)){ ?>
    <div class='center-content red-bg'>  
      <h1 class='animate__animated animate__pulse not-in-image'><?php the_title(); ?></h1>
      <br />
    </div>
  <?php } ?>
  
    <div class='container center-content red-links'>
      <div class='row'>
        <div class='col'>        
          <?php while ( have_posts() ) : the_post(); ?>
          <br />  
          <content>
              <?php the_content(); ?>
            </content>
          <?php endwhile; wp_reset_query(); ?>
        </div>
      </div>
    </div>

    <div class='red-bg'>
      <div class='container center-content'>
        <div class='row'>
          <div class='col'>
            <br/><br/>
            <h2>Get in touch</h2> 
            <?php echo do_shortcode('[contact-form-7 id="258" title="General enquiries"]'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php get_footer(); ?>