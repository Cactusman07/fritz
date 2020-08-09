<?php

/**
 * The template for displaying The Franchise page
 *
 * Template Name: Franchise
 *
 * @package WordPress
 * @subpackage Fritz
 */

?>

<?php get_header(); ?>
<?php $imgUrl = get_the_post_thumbnail_url(); ?>

  <div id='franchiseContainer'>
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

    <div class='container center-content red-links'>
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

  <?php while ( have_posts() ) : the_post(); ?>
  <?php 
    $equipmentList = get_field('equipment');
    
    $mfD = $equipmentList['mini_fritz_description'];
    $kvD = $equipmentList['kombi_description'];
    $cbD = $equipmentList['custom_built_hut_description'];

    $mfI = $equipmentList['mini_fritz_image'];
    $kvI = $equipmentList['kombi_image'];
    $cbI = $equipmentList['custom_built_hut_image'];

    $isMFImage = $mfI == null || $mfI == '';
    $isKVImage = $kvI == null || $kvI == '';
    $isCBImage = $cbI == null || $cbI == '';

    $franchiseList = get_field('franchise_list');

    $oneD = $franchiseList['first_description'];
    $twoD = $franchiseList['second_description'];
    $threeD = $franchiseList['third_description'];
    $fourD = $franchiseList['fourth_description'];
    $fiveD = $franchiseList['fifth_description'];

    $oneI = $franchiseList['first_image'];
    $twoI = $franchiseList['second_image'];
    $threeI = $franchiseList['third_image'];
    $fourI = $franchiseList['fourth_image'];
    $fiveI = $franchiseList['fifth_image'];

    $isFirstImage = $oneI == null || $oneI == '';
    $isSecondImage = $twoI == null || $twoI == '';
    $isThirdImage = $threeI == null || $threeI == '';
    $isFourthImage = $fourI == null || $fourI == '';
    $isFifthImage = $fiveI == null || $fiveI == '';
  ?>

  <div id='miniFritz'>
      <div class='container center-content'>
        <div class='row'>
          <div class='<?php echo ($isMFImage) ? 'col-12' : 'col-12 col-md-8'; ?>' >
            <content class='equipment-content'>              
              <?php echo $mfD; ?>
            </content>
          </div>
          <div class='franchise-img-container <?php echo ($isMFImage) ? 'hidden' : 'col-12 col-md-4'; ?>' >
            <?php if(!$isMFImage) { ?>
              <img src='<?php echo $mfI; ?>' class='franchise-img' />
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

    <div id='kombi'>
      <div class='container center-content'>
        <div class='row'>
          <div class='franchise-img-container <?php echo ($isKVImage) ? 'hidden' : 'col-12 col-md-4 order-2 order-md-4'; ?>' >
            <?php if(!$isKVImage) { ?>
              <img src='<?php echo $kvI; ?>' class='franchise-img' />
            <?php } ?>
          </div>
          <div class='<?php echo ($isKVImage) ? 'col-12' : 'col-12 col-md-8 order-1 order-md-4'; ?>' >
            <content class='equipment-content'>              
              <?php echo $kvD; ?>
            </content>
          </div>
        </div>
      </div>
    </div>

    <div id='customBuilt'>
      <div class='container center-content'>
        <div class='row'>
          <div class='<?php echo ($isCBImage) ? 'col-12' : 'col-12 col-md-8'; ?>' >
            <content class='equipment-content'>              
              <?php echo $cbD; ?>
            </content>
          </div>
          <div class='franchise-img-container <?php echo ($isCBImage) ? 'hidden' : 'col-12 col-md-4'; ?>' >
            <?php if(!$isCBImage) { ?>
              <img src='<?php echo $cbI; ?>' class='franchise-img' />
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

    <div class='container center-content'>
      <div class='row'>
        <div class='col-12'>
          <content class='franchise-content'>
            <h2>Need more convincing?</h2>
            <p>What entrepreneur doesn’t love a good list? So we’ve compiled a list of reasons why Fritz’s Wieners is different from everyone else.</p>
          </content>
        </div>
      </div>
    </div>
  </div>

  <div id='first'>
    <div class='container center-content'>
      <div class='row'>
        <div class='<?php echo ($isFirstImage) ? 'col-12' : 'col-12 col-md-8'; ?>' >
          <content class='franchise-content'>              
            <?php echo $oneD; ?>
          </content>
        </div>
        <div class='franchise-img-container <?php echo ($isFirstImage) ? 'hidden' : 'col-12 col-md-4'; ?>' >
          <?php if(!$isFirstImage) { ?>
            <img src='<?php echo $oneI; ?>' class='franchise-img' />
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <div id='second'>
    <div class='container center-content'>
      <div class='row'>
        <div class='franchise-img-container <?php echo ($isSecondImage) ? 'hidden' : 'col-12 col-md-4 order-2 order-md-4'; ?>' >
          <?php if(!$isSecondImage) { ?>
            <img src='<?php echo $twoI; ?>' class='franchise-img' />
          <?php } ?>
        </div>
        <div class='<?php echo ($isSecondImage) ? 'col-12' : 'col-12 col-md-8 order-1 order-md-4'; ?>' >
          <content class='franchise-content'>              
            <?php echo $twoD; ?>
          </content>
        </div>
      </div>
    </div>
  </div>

  <div id='third'>
    <div class='container center-content'>
      <div class='row'>
        <div class='<?php echo ($isThirdImage) ? 'col-12' : 'col-12 col-md-8'; ?>' >
          <content class='franchise-content'>              
            <?php echo $threeD; ?>
          </content>
        </div>
        <div class='franchise-img-container <?php echo ($isThirdImage) ? 'hidden' : 'col-12 col-md-4'; ?>' >
          <?php if(!$isThirdImage) { ?>
            <img src='<?php echo $threeI; ?>' class='franchise-img' />
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <div id='fourth'>
    <div class='container center-content'>
      <div class='row'>        
        <div class='<?php echo ($isFourthImage) ? 'col-12' : 'col-12 col-md-8 order-1 order-md-4'; ?>' >
          <content class='franchise-content'>              
            <?php echo $fourD; ?>
          </content>
        </div>
        <div class='franchise-img-container <?php echo ($isFourthImage) ? 'hidden' : 'col-12 col-md-4 order-2 order-md-4'; ?>' >
          <?php if(!$isSecisFourthImageondImage) { ?>
            <img src='<?php echo $fourI; ?>' class='franchise-img' />
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <div id='fifth'>
    <div class='container center-content'>
      <div class='row'>
        <div class='<?php echo ($isFifthImage) ? 'col-12' : 'col-12 col-md-8'; ?>' >
          <content class='franchise-content'>              
            <?php echo $fiveD; ?>
          </content>
        </div>
        <div class='franchise-img-container <?php echo ($isFifthImage) ? 'hidden' : 'col-12 col-md-4'; ?>' >
          <?php if(!$isFifthImage) { ?>
            <img src='<?php echo $fiveI; ?>' class='franchise-img' />
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>