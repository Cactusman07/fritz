<?php header('Access-Control-Allow-Origin: *'); ?>
<?php $logo = get_template_directory_uri() . '/' . 'images/Fritzs-Wieners-Logo.png'; ?>
<?php $icon = get_template_directory_uri() . '/' . 'images/HeartIcon.png'; ?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta http-equiv='content-type' content='text/html;charset=utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title><?php wp_title('|', true, 'right'); ?></title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />    

    <?php wp_head(); ?>    

    </head>
    <body <?php body_class(); ?>>
      <header>
        <div id='topLinks'>
          <?php wp_nav_menu( array( 'theme_location' => 'top-links', 'container' => '' ) ); ?>
        </div>
        <a href='<?php echo get_home_url(); ?>' class='link-no-border'>
          <img id='logo' src='<?php echo $logo; ?>'/>
        </a>

        <div class='open' id='mainMenu'>
          <span class='cls'></span>
          <span>
            <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => '' ) ); ?>
          </span>
          <span class='cls'></span>
        </div>
        <img id='headerIcon' src='<?php echo $icon; ?>' />
      </header>
      <div id='headerBuffer'></div>