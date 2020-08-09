<?php get_header(); ?>
  <?php $menuLink = get_home_url() . '/menu'; ?>

  <div id='fritzImgContainer' class='container center-content'>
    <div class='row'>
      <div id='burst' class='col'>
        <h1 class='animate__animated animate__pulse'><?php the_title(); ?></h1>
        <?php while ( have_posts() ) : the_post(); ?>
          <content>
            <?php bloginfo( 'description' ); ?>
            <br/>
            <br/>
            <?php the_content(); ?>
            <?php 
              $imgUrl = get_the_post_thumbnail_url();
              if (!!$imgUrl){ ?>
                <img src='<?php echo $imgUrl ?>' />  
              <?php
              }
              ?>
            
          </content>
          
          <a href='<?php echo the_field('call_to_action_link'); ?>' 
            class='bottom-neg40 primary-button link-no-border animate__animated animate__headShake animate__delay-2s animate__repeat-2'>
            <?php echo the_field('call_to_action_button'); ?>
          </a>
        <?php endwhile;
          wp_reset_query();
        ?>
      </div>
    </div>
  </div>

  <div id='productContainer'>
    <div class='container-sm center-content'>
      <div class='row'>
        <?php while ( have_posts() ) : the_post(); ?>
          <div class='col-12'>
            <h3><?php echo the_field('menu_header'); ?></h3>
            <p><?php echo the_field('menu_description'); ?></p>            
          </div>
          
          <?php 
            $query = new WP_Query ( array ( 
              'post_type'       => 'products', 
              'orderby'         => the_field('order'),
              'order'           => 'ASC',
              'posts_per_page'  => 6 ) );

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
      <div class='row'>
        <div class='col-12'>
          <a href='<?php echo $menuLink ?>' class='bottom-neg40 primary-button link-no-border'>View full menu</a>
        </div>
      </div>
    </div>
  </div>

  <div id="mapContainer">
    <div id='map'></div>
    <div id='infoWindow' class='hidden'></div>
  </div>

  <script type="text/javascript" defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAN8uDlNkrTYVg4FVKz21sCcUi84y2EhTg&libraries=geometry,places&callback=initMap">
  </script>
<?php get_footer(); ?>