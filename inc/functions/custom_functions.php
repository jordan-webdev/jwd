<?php

// Archive pagination (derived from http://www.wpbeginner.com/wp-themes/how-to-add-numeric-pagination-in-your-wordpress-theme/)
function ajax_archive_pagination()
{
    if (is_singular()) {
        return;
    }

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1) {
        return;
    }

    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max   = intval($wp_query->max_num_pages);

    /**	Add current page to the array */
    if ($paged >= 1) {
        $links[] = $paged;
    }

    /**	Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<nav class="pagination-wrapper js-ajax-pagination"><ul class="flex flex-wrap justify-center align-end">' . "\n";

    /**	Previous Post Link */
    if (get_previous_posts_link()) {
        printf('<li>%s</li>' . "\n", get_previous_posts_link('«'));
    }

    /**	Link to first page, plus ellipses if necessary */
    if (! in_array(1, $links)) {
        $class = 1 == $paged ? ' class="current"' : '';

        printf('<li%s><a href="%s" class="js-ajax-link">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

        if (! in_array(2, $links)) {
            echo '<li class="dots">…</li>';
        }
    }

    /**	Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array) $links as $link) {
        $class = $paged == $link ? ' class="current"' : '';
        printf('<li%s><a href="%s" class="js-ajax-link">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }

    /**	Link to last page, plus ellipses if necessary */
    if (! in_array($max, $links)) {
        if (! in_array($max - 1, $links)) {
            echo '<li class="dots">…</li>' . "\n";
        }

        $class = $paged == $max ? ' class="current"' : '';
        printf('<li%s><a href="%s" class="js-ajax-link">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    /**	Next Post Link */
    if (get_next_posts_link()) {
        printf('<li>%s</li>' . "\n", get_next_posts_link('»'));
    }

    echo '</ul></nav>' . "\n";
}

// Category has parent https://stackoverflow.com/questions/19064875/how-to-check-if-a-category-has-a-parent-category
function category_has_parent($catid){
    $category = get_category($catid);
    if ($category->category_parent > 0){
        return true;
    }
    return false;
}

// Get excerpt function
function get_excerpt($limit)
{
    global $post;
    $excerpt = get_the_content();
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = $excerpt.'…';
    return $excerpt;
}

function jwd_get_the_archive_title(){
  $unmodified = get_the_archive_title();
  $modified = str_replace(array("Archives: ", "Category: "), "", $unmodified);

  return $modified;
}
