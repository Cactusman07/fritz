<?php header('Access-Control-Allow-Origin: *'); ?>
<?php $fav_url = get_template_directory_uri() . '/' . 'images/favicon-16x16.png'; ?>
<?php $logo = get_template_directory_uri() . '/' . 'images/Fritzs-Wieners-Logo.png'; ?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta http-equiv='content-type' content='text/html;charset=utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title><?php wp_title('|', true, 'right'); ?></title>
  	
    <link rel='shortcut icon' href='<?php echo $fav_url ?>' type='image/x-icon' />
    <link rel='apple-touch-icon' sizes='144x144' href='<?php echo $fav_url ?>'/>
    <link rel='icon' type='image/png' href='<?php echo $fav_url ?>' sizes='32x32'/>
    <link rel='icon' type='image/png' href='<?php echo $fav_url ?>' sizes='16x16'/>
    <meta name='theme-color' content='#ffffff'/>
    <!--[if lt IE 9]>
    <script type='text/javascript' src='<?php echo THEME_URI; ?>js/html5.js'></script>
    <![endif] -->
    
    <?php wp_head(); ?>
    </head>
  <body <?php body_class(); ?>>
    <header>
      <a href='<?php get_template_directory_uri() ?>' class='link-no-border'>
        <img id='logo' src='<?php echo $logo ?>'/>
      </a>

      <div class='open' id='mainMenu'>
        <span class='cls'></span>
        <span>
           <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => '' ) ); ?>
        </span>
        <span class='cls'></span>
    </div>
    </header>