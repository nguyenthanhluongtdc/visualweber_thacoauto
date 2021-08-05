<?php

register_page_template([
    'no-sidebar' => __('No sidebar'),
    'default' => 'Default',
    'posts' => 'Posts',
    'media-event' => 'Media Event',
    'media-newspapers' => 'Media newspapers',
    'news-thaco' => 'News Thaco',
    'production' => 'production',
    'news-thaco' => 'News Thaco',
    'media-gallery' => 'Media Gallery',
    'value-system' => 'Value system',
    'manufacturing' => 'Manufacturing',
    'research-development' => 'Research & Development',
    'cultural' => 'Cultural',
    'services' => 'Services',
    'services-support' => 'Services Support',
    'contact' => 'Contact',
    'business-system' => 'Business system',
    'production-assemble' => 'Production assemble',
    'thacoauto-province'    => 'Thaco auto province',
    'business-overview' => 'Business overview',
    'general-manufacturing' => 'General Manufacturing',
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
