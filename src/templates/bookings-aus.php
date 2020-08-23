<?php

/**
 * The template for displaying The Booking page (NZ)
 *
 * Template Name: Bookings
 *
 * @package WordPress
 * @subpackage Fritz
 */

?>

<?php get_header(); ?>
<?php $imgUrl = get_the_post_thumbnail_url(); ?>

<div id='bookingContainer'>
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
  
  <?php while ( have_posts() ) : the_post(); ?>
  <?php $bookings = get_field('bookings_descriptions'); ?>
  
    <div class='container center-content red-links'>
      <div class='row'>
        <div class='col'>          
          <content>
            <?php the_content(); ?>
          </content>
        </div>
      </div>
    </div>
    
    <div class='center-content red-bg'>
      <?php include 'booking-contacts-aus.php' ?>
    </div>
    <div class='container center-content padding-bottom-40 padding-top-40'>
      <div class='row'>
        <div class='col-md-6 col-12'>
          <div class='booking-desc' style='background:linear-gradient(50deg, rgba(45, 41, 38, 0.9), rgba(83, 79, 76, 0.75)), url("<?php echo $bookings['wedding_background_image']; ?>")'>
            <?php echo $bookings['weddings_description']; ?>
          </div>
        </div>
        <div class='col-md-6 col-12'>
          <div class='booking-desc' style='background:linear-gradient(50deg, rgba(45, 41, 38, 0.9), rgba(83, 79, 76, 0.75)),url("<?php echo $bookings['corporate_background_image']; ?>")'>
            <?php echo $bookings['corporate_description']; ?>
          </div>
        </div>
        <div class='col-md-6 col-12'>
          <div class='booking-desc' style='background:linear-gradient(50deg, rgba(45, 41, 38, 0.9), rgba(83, 79, 76, 0.75)),url("<?php echo $bookings['private_background_image']; ?>")'>
            <?php echo $bookings['private_description']; ?>
          </div>
        </div>
        <div class='col-md-6 col-12'>
          <div class='booking-desc' style='background:linear-gradient(50deg, rgba(45, 41, 38, 0.9), rgba(83, 79, 76, 0.75)),url("<?php echo $bookings['birthday_background_image']; ?>")'>
            <?php echo $bookings['birthday_description']; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endwhile; wp_reset_query(); ?>

  </div>

<?php get_footer(); ?>