<?php
/*
 * Copyright
 * Copyright text with year, Dolce Media Link
 */

$d = get_field("disclaimer", "options");
?>

<div class="disclaimer">
  <p class="text"><?php echo esc_html($d); ?></p>
  <p class="copyright">
      Copyright &copy; <?php echo Date('Y'); ?>. All Rights Reserved <?php bloginfo('title'); ?>
      Designed and developed by <a href="http://www.dolcemedia.ca/" rel="noopener noreferrer" target="_blank">Dolce Media Group</a>
  </p>
</div>
