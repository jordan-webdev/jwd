<?php
// List of products + contact form
function contact_form_shortcode( $atts , $content = null ) {
  ob_start();
  ?>

  <div class="request-quote flex column space-between color-med-grey--bg pad-t-30 pad-l-35 pad-r-35 pad-b-30 relative">
    <!-- List -->
    <div class="request-quote__grid-item flex column">
      <!-- Title -->
      <h2 class="request-quote__title color-primary font-secondary font-24 mar-b-20">MY LIST</h2>
      <!-- Memory List -->
      <ul class="request-quote__list js-product-list color-white--bg pad-t-25 pad-l-25 pad-b-25 pad-r-25 height-100">
        <li class="product-list__item js-no-products-msg">There are currently no items in your list</li>
      </ul>
    </div>

    <div class="request-quote__grid-item">
      <!-- Title -->
      <h2 class="request-quote__title color-primary font-secondary font-24 mar-b-20">CONTACT US</h2>
      <!-- Form -->
      <?php echo do_shortcode('[contact-form-7 id="362" title="Request A Quote"]'); ?>
    </div>
  </div>

	<?php return ob_get_clean();
}
add_shortcode( 'contact_form', 'contact_form_shortcode' );
