<?php $facebook = get_template_directory_uri() . '/' . 'images/facebook.png'; ?>
<?php $twitter = get_template_directory_uri() . '/' . 'images/twitter.png'; ?>
<?php $insta = get_template_directory_uri() . '/' . 'images/instagram.png'; ?>
<?php $musicNote = get_template_directory_uri() . '/' . 'images/MusicNoteIcon.png'; ?>

  </body>
  <?php  wp_footer(); ?>
  <script async src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
  <footer>
    <div class='container'>
      <div class='row'>
        <div class='col-md-6' id='social'>
          <img src='<?php echo $musicNote; ?>' />
          <a href='http://www.twitter.com/FritzsWieners' class='link-no-border' target='_blank'>
            <img src='<?php echo $twitter; ?>' />
          </a>
          <a href='http://www.facebook.com/FritzsWieners' class='link-no-border' target='_blank'>
            <img src='<?php echo $facebook; ?>' />
          </a>
          <a href='https://www.instagram.com/fritzs_wieners_nz/' class='link-no-border' target='_blank'>
            <img src='<?php echo $insta; ?>' />
          </a>
        </div>
        <div class='col-md-6' id='siteFooterText'>
          <p>Fritz's Wieners | &copy; <?php echo date("Y"); ?></p>
        </div>
      </div>
    </div>
  </footer>
</html>