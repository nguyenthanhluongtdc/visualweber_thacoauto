<?php

register_page_template([
    'no-sidebar' => __('No sidebar'),
    'default' => 'Default',
    'posts' => 'Posts',
    'about' => 'About',
    'media-event' => 'Media Event',
    'media-newspapers' => 'Media newspapers'
]);

register_sidebar([
    'id'          => 'top_sidebar',
    'name'        => __('Top sidebar'),
    'description' => __('Area for widgets on the top sidebar'),
]);

register_sidebar([
    'id'          => 'footer_sidebar',
    'name'        => __('Footer sidebar'),
    'description' => __('Area for footer widgets'),
]);

RvMedia::setUploadPathAndURLToPublic();
RvMedia::addSize('featured', 565, 375)->addSize('medium', 540, 360);
