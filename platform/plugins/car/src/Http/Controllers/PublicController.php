<?php

namespace Platform\Car\Http\Controllers;

use Platform\Base\Http\Controllers\BaseController;
use Platform\Car\Models\Brand;
use Platform\Car\Repositories\Interfaces\BrandInterface;
use Platform\Slug\Repositories\Interfaces\SlugInterface;

class PublicController extends BaseController
{
    protected $brandRepository;

    public function __construct(BrandInterface $brandRepository)
    {
        \Theme::asset()->usePath()->add('reset_css', 'css/reset.css');
        $this->brandRepository = $brandRepository;
    }

    public function getBrandBySlug($slug, SlugInterface $slugRepository)
    {
        $slug = $slugRepository->getFirstBy(['key' => $slug, 'reference_type' => Brand::class]);
        if (!$slug) {
            abort(404);
        }
        $data = $this->brandRepository->getFirstBy(['id' => $slug->reference_id]);

        if (!$data) {
            abort(404);
        }

        $meta = \MetaBox::getMetaData($data, 'seo_meta', true);
        \SeoHelper::setTitle(isset($meta['seo_title']) ? $meta['seo_title'] : $data->name)
            ->setDescription((isset($meta['seo_description']) ? $meta['seo_description'] : $data->description) ?: theme_option('site_description'))
            ->openGraph()
            ->setImage(\RvMedia::getImageUrl(@$data->image, 'og', false, \RvMedia::getImageUrl(theme_option('seo_og_image'))))
            ->addProperties(
                [
                    'image:width' => '1200',
                    'image:height' => '630'
                ]
            );

        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, BRAND_MODULE_SCREEN_NAME, $data);

        return \Theme::scope('brand-detail', compact('data'))->render();
    }
}
