<?php

use Illuminate\Support\Facades\DB;

register_page_template([
    'no-sidebar' => __('No sidebar'),
    'default' => 'Default',
    'custom-page' => 'Custom page',
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
    'export' => 'Export',
    'cultural' => 'Cultural',
    'services' => 'Services',
    'services-support' => 'Services Support',
    'contact' => 'Contact',
    'business-system' => 'Business system',
    'production-and-assemble' => 'Production and assemble',
    'production-assemble' => 'Production assemble',
    'thacoauto-province'    => 'Thaco auto province',
    'business-overview' => 'Business overview',
    'introduce' => 'Introduce',
    'general-manufacturing' => 'General Manufacturing',
    'mechanical' => 'Mechanical',
    'brand' => 'Brand',
    'support-industry' => 'Support-industry',
    'test-drive' => 'Test drive',
    'deposit' => 'Deposit',
    'cost-estimates' => "Cost Estimates",
    'pre-order' => "Pre-order",
    'distribution-system' => 'Distribution system'
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
RvMedia::addSize('featured', 565, 375)
    ->addSize('medium', 540, 360)
    ->addSize('post-related', 313, 171)
    ->addSize('post-large', 900, 485);

add_filter(BASE_FILTER_BEFORE_RENDER_FORM, function ($form, $data) {
    if (get_class($data) == \Platform\Blog\Models\Post::class) {

        $region = \MetaBox::getMetaData($data, 'region_post', true);

        $regions = DB::table('tinhthanhpho')->get()->pluck('name', 'name')->toArray() ?? [];

        $form
            ->add('region', 'customSelect', [
                'label'      => __('Khu vực'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => $regions,
                'value'      => $region,
                'attr'       => [
                    'class' => 'form-control select-search-full',
                ]
            ]);
    }

    return $form;
}, 120, 3);

add_action(BASE_ACTION_AFTER_CREATE_CONTENT, 'save_addition_fields', 120, 3);
add_action(BASE_ACTION_AFTER_UPDATE_CONTENT, 'save_addition_fields', 120, 3);

/**
 * @param string $screen
 * @param Request $request
 * @param Model $data
 */
function save_addition_fields($screen, $request, $data)
{
    if (get_class($data) == \Platform\Blog\Models\Post::class) {
        \MetaBox::saveMetaBoxData($data, 'region_post', $request->input('region'));
    }
}
