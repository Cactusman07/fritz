<div id='bookingContacts'>
  <h2>Book your function</h2>

  <div class='container'>
    <div class='row'>
      <div class='col-lg-1'></div>
      <div class='col-12 col-sm-4 col-lg-2'>
        <a id='aucklandContact' href='' class='secondary-button link-no-border'>Auckland</a>
      </div>
      <div class='col-12 col-sm-4 col-lg-2'>
        <a id='christchurchContact' href='' class='secondary-button link-no-border'>Christchurch</a>
      </div>
      <div class='col-12 col-sm-4 col-lg-2'>
        <a id='dunedinContact' href='' class='secondary-button link-no-border'>Dunedin</a>
      </div>
      <div class='col-12 col-sm-4 col-lg-2 offset-sm-2 offset-lg-0'>
        <a id='hamiltonContact' href='' class='secondary-button link-no-border'>Hamilton</a>
      </div>
      <div class='col-12 col-sm-4 col-lg-2'>
        <a id='wellingtonContact' href='' class='secondary-button link-no-border'>Wellington</a>
      </div>
      <div class='col-lg-1'></div>
    </div>
  </div>

  <div id='popupForm' class='hidden'>
    <div class='contact-form'>
      <div id='close'> X </div>
      <div id='aucklandForm' class='hidden'>
        <h3>Auckland</h3>
        <?php echo do_shortcode('[contact-form-7 id="212" title="Contact form Auckland"]'); ?>
      </div>
      <div id='christchurchForm' class='hidden'>
        <h3>Christchurch</h3>
        <?php echo do_shortcode('[contact-form-7 id="215" title="Contact form Christchurch"]'); ?>
      </div>
      <div id='dunedinForm' class='hidden'>
        <h3>Dunedin</h3>
        <?php echo do_shortcode('[contact-form-7 id="216" title="Contact form Dunedin"]'); ?>
      </div>
      <div id='hamiltonForm' class='hidden'>
        <h3>Hamilton</h3>
        <?php echo do_shortcode('[contact-form-7 id="213" title="Contact form Hamilton"]'); ?>
      </div>
      <div id='wellingtonForm' class='hidden'>
        <h3>Wellington</h3>
        <?php echo do_shortcode('[contact-form-7 id="214" title="Contact form Wellington"]'); ?>
      </div>
    </div>
  </div>
</div>