<div id='bookingContacts'>
  <h2>Book your function</h2>

  <div class='container'>
    <div class='row'>
      <div class='col-lg-1'></div>
      <div class='col-12 col-sm-6 col-lg-2'>
        <a id='aucklandContact' href='' class='secondary-button link-no-border'>Auckland</a>
      </div>
      <div class='col-12 col-sm-6 col-lg-2'>
        <a id='christchurchContact' href='' class='secondary-button link-no-border'>Christchurch</a>
      </div>
      <div class='col-12 col-sm-6 col-lg-2'>
        <a id='hamiltonContact' href='' class='secondary-button link-no-border'>Hamilton</a>
      </div>
      <div class='col-12 col-sm-6 col-lg-2'>
        <a id='wellingtonContact' href='' class='secondary-button link-no-border'>Wellington</a>
      </div>
		<div class='col-12 col-sm-6 col-lg-2'>
        <a id='napierHastingsContact' href='' class='secondary-button link-no-border'>Hawke's Bay</a>
      </div>
    </div>
    <div class='col-lg-1'></div>
  </div>

  <div id='popupForm' class='hidden'>
    <div class='contact-form'>
      <div id='close'> X </div>
      <div id='aucklandForm' class='hidden'>
        <h3>Auckland</h3>
        <?php echo do_shortcode('[contact-form-7 id="ecbc6d9" title="Contact form Auckland"]'); ?>
      </div>
      <div id='christchurchForm' class='hidden'>
        <h3>Christchurch</h3>
        <?php echo do_shortcode('[contact-form-7 id="13a1df4" title="Contact form Christchurch"]'); ?>
      </div>
      <div id='hamiltonForm' class='hidden'>
        <h3>Hamilton</h3>
        <?php echo do_shortcode('[contact-form-7 id="8500626" title="Contact form Hamilton"]'); ?>
      </div>
      <div id='wellingtonForm' class='hidden'>
        <h3>Wellington</h3>
        <?php echo do_shortcode('[contact-form-7 id="b59f0d2" title="Contact form Wellington"]'); ?>
      </div>
		<div id='napierHastingsForm' class='hidden'>
        <h3>Hawke's Bay</h3>
        <?php echo do_shortcode('[contact-form-7 id="d379300" title="Contact form Hawkes Bay"]'); ?>
      </div>
    </div>
  </div>
</div>