<?php

/**
 * The template for displaying a standard page, with the locations at the bottom
 *
 * Template Name: Location page
 *
 * @package WordPress
 * @subpackage Fritz
 */

?>

<?php include 'location-header.php' ?>
<?php $imgUrl = get_the_post_thumbnail_url(); ?>

  <?php $menuLink = get_template_directory_uri() . '/menu'; ?>

  <div id='locationPage'>
  <?php if($imgUrl != '' || $imgUrl != null){ ?>
    <div id='imageHeader' style='background-image:url("<?php echo $imgUrl; ?>")'>
      <h1 class='animate__animated animate__pulse'><?php the_title(); ?></h1>
    </div>
  <?php } ?>

  <?php if(!($imgUrl != '' || $imgUrl != null)){ ?>
    <div class='center-content red-bg'>  
      <h1 class='animate__animated animate__pulse not-in-image'><?php the_title(); ?></h1>
      <br/>
    </div>
  <?php } ?>
  
    <div class='container center-content red-links'>
      <div class='row'>
        <div class='col'>        
          <?php while ( have_posts() ) : the_post(); ?>
            <br/>
            <content>
              <?php the_content(); ?>
            </content>
          <?php endwhile; wp_reset_query(); ?>
        </div>
      </div>
    </div>

    <div id="mapContainer">
      <div id='map'></div>
      <div id='infoWindow' class='hidden'></div>
    </div>

  </div>

<?php get_footer(); ?>