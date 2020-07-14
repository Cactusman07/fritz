<?php

/**
 * The template for displaying The About Us page
 *
 * Template Name: About us
 *
 * @package WordPress
 * @subpackage Fritz
 */

?>

<?php get_header(); ?>
<?php $imgUrl = get_the_post_thumbnail_url(); ?>

  <div id='aboutUsContainer'>
  <?php if($imgUrl != '' || $imgUrl != null){ ?>
    <div id='imageHeader' style='background-image:url("<?php echo $imgUrl; ?>")'>
      <h1 class='animate__animated animate__pulse'><?php the_title(); ?></h1>
    </div>
  <?php } ?>

  <?php if(!($imgUrl != '' || $imgUrl != null)){ ?>
    <div class='center-content red-bg'>    
      <h1 class='animate__animated animate__pulse not-in-image'><?php the_title(); ?></h1>    
    </div>
  <?php } ?>

    <div class='container center-content'>
      <div class='row'>
        <div class='col'>          
          <?php while ( have_posts() ) : the_post(); ?>
            <content>
              <?php the_content(); ?>        
            </content>
          <?php endwhile; wp_reset_query(); ?>
        </div>
      </div>
    </div>
  </div>

<?php get_footer(); ?>