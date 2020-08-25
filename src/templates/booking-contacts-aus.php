<div id='bookingContacts'>
  <h2>Book your function</h2>

  <div class='container'>
    <div class='row'>
      <div class='col-lg-1'></div>
      <div class='col-12 col-sm-4 col-lg-2'>
        <a id='brisbaneContact' href='' class='secondary-button link-no-border'>Brisbane</a>
      </div>
      <div class='col-12 col-sm-4 col-lg-2'>
        <a id='goldCoastContact' href='' class='secondary-button link-no-border'>Gold Coast</a>
      </div>
      <div class='col-12 col-sm-4 col-lg-2'>
        <a id='melbourneContact' href='' class='secondary-button link-no-border'>Melbourne</a>
      </div>
      <div class='col-12 col-sm-4 col-lg-2 offset-sm-2 offset-lg-0'>
        <a id='sunshineCoastContact' href='' class='secondary-button link-no-border'>Sunshine Coast</a>
      </div>
      <div class='col-12 col-sm-4 col-lg-2'>
        <a id='sydneyContact' href='' class='secondary-button link-no-border'>Sydney</a>
      </div>
      <div class='col-lg-1'></div>
    </div>
  </div>

  <div id='popupForm' class='hidden'>
    <div class='contact-form'>
      <div id='close'> X </div>
      <div id='brisbaneForm' class='hidden'>
        <h3>Brisbane</h3>
        <?php echo do_shortcode('[contact-form-7 id="212" title="Contact form Brisbane"]'); ?>
      </div>
      <div id='goldCoastForm' class='hidden'>
        <h3>Gold Coast</h3>
        <?php echo do_shortcode('[contact-form-7 id="215" title="Contact form Gold Coast"]'); ?>
      </div>
      <div id='melbourneForm' class='hidden'>
        <h3>Melbourne</h3>
        <?php echo do_shortcode('[contact-form-7 id="216" title="Contact form Melbourne"]'); ?>
      </div>
      <div id='sunshineCoastForm' class='hidden'>
        <h3>Sunshine Coast</h3>
        <?php echo do_shortcode('[contact-form-7 id="213" title="Contact form Sunshine Coast"]'); ?>
      </div>
      <div id='sydneyForm' class='hidden'>
        <h3>Sydney</h3>
        <?php echo do_shortcode('[contact-form-7 id="214" title="Contact form Sydney"]'); ?>
      </div>
    </div>
  </div>
</div>