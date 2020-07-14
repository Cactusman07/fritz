<?php

/**
 * The template for displaying The Menu page
 *
 * Template Name: Menu
 *
 * @package WordPress
 * @subpackage Fritz
 */

?>

<?php get_header(); ?>
<?php $imgUrl = get_the_post_thumbnail_url(); ?>

  <div id='menuContainer'>
  <?php if($imgUrl != '' || $imgUrl != null){ ?>
    <div id='imageHeader' style='background-image:url("<?php echo $imgUrl; ?>")'>
      <h1 class='animate__animated animate__pulse'><?php the_title(); ?></h1>
    </div>
  <?php } ?>
  
  <?php if(!($imgUrl != '' || $imgUrl != null)){ ?>  
    <div class='container center-content'>
      <div class='row'>
        <div class='col'>        
          <h1 class='animate__animated animate__pulse white'><?php the_title(); ?></h1>        
        </div>
      </div>
    </div>
    <?php } ?>
  
  </div>

  <div id='productContainer'>
    <div class='container-sm center-content'>
      <div class='row'>
          <div class='col-12'>
          <?php while ( have_posts() ) : the_post(); ?>
            <content>
              <?php the_content(); ?>
              
            </content>
          <?php endwhile;
            wp_reset_query();
          ?>
          </div>
        <?php while ( have_posts() ) : the_post(); ?>
          <div class='col-12'>
            <h3><?php echo the_field('menu_header'); ?></h3>
            <p><?php echo the_field('menu_description'); ?></p>            
          </div>
          
          <?php 
            $query = new WP_Query ( array ( 
              'post_type'       => 'products', 
              'orderby'         => the_field('order'),
              'order'           => 'ASC'
            ) );

            if ( $query->have_posts() ) : while ($query->have_posts() ) : $query->the_post(); 
          ?>

          <div class='col-12 col-sm-6 col-md-4'>
            <div class='product hidden'>
              <?php the_post_thumbnail() ?>
              <h5><?php the_title(); ?></h5>
              <div class='product-content'><?php the_content(); ?></div>
            </div>
          </div>
          
          <?php endwhile; else : ''?>
          <?php endif; wp_reset_postdata();?>

        <?php endwhile; wp_reset_query(); ?>
      </div>
    </div>
  </div>

<?php get_footer(); ?>