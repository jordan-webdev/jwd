<?php
/*
 * Top Bar for the desktop header
 */

$phone = get_field("site_phone", 'options');
$email = get_field("site_email", "options");
?>

<div class="grid-x">

  <!-- Social Media -->
  <nav class="social-media cell medium-6 flex">
    <?php if ( have_rows("social_media", "options") ) : ?>
      <ul class="social-media-list flex">
        <?php while ( have_rows("social_media", "options") ) :
          the_row();
          $type = strtolower(get_sub_field("social_media_name"));
          $link = get_sub_field("social_media_link");
        ?>
          <li class="social-media-list-item">
            <a class="social-media-link" href="<?php echo esc_url($link); ?>">
              <span class="fa fa-<?php echo esc_attr($type); ?>" aria-hidden="true"></span>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php endif; ?>
  </nav>

  <!-- Contact Info -->
  <nav class="contact-info cell medium-6">
    <ul class="flex contact-info-list">
      <li class="contact-info-item">
        <a class="phone contact-link" href="tel:<?php echo esc_attr(str_replace(" ", "", $phone)); ?>"><?php echo esc_html(str_replace(" ", ".", $phone)); ?></a>
      </li>
      <li class="contact-info-item">
        <a class="email contact-link" href="mailto:<?php echo esc_url($email); ?>"><?php echo esc_html(strtoupper($email)); ?></a>
      </li>
    </ul>
  </nav>

</div>
