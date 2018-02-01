<?php

function enqueue_extra_tinymce_buttons_scripts($plugin_array)
{
    //enqueue TinyMCE plugin script with its ID.
    $plugin_array["shortcode_buttons"] =  get_template_directory_uri() . "/inc/functions/extra_tinymce_buttons/index.js";
    return $plugin_array;
}

add_filter("mce_external_plugins", "enqueue_extra_tinymce_buttons_scripts");

function add_tinymce_buttons($buttons)
{
    //register buttons with their id.
    array_push($buttons, "align_center, half_items, three_col, four_col");
    return $buttons;
}

add_filter("mce_buttons", "add_tinymce_buttons");
