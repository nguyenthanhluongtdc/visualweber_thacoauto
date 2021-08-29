<?php

namespace Platform\Car\Http\Controllers;

use Platform\Brand\Models\Brand;
use Platform\CarCategory\Models\CarCategory;
use Platform\Base\Http\Controllers\BaseController;
use Platform\Brand\Repositories\Interfaces\BrandInterface;
use Platform\Slug\Repositories\Interfaces\SlugInterface;
use Platform\CarCategory\Repositories\Interfaces\CarCategoryInterface;


class PublicController extends BaseController
{
    protected $brandRepository, $carCategoryRepository;

    public function __construct(BrandInterface $brandRepository, CarCategoryInterface $carCategoryRepository)
    {
        \Theme::asset()->usePath()->add('reset_css', 'css/reset.css');
        $this->brandRepository = $brandRepository;
        $this->carCategoryRepository = $carCategoryRepository;
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

        return \Theme::scope('brand-detail', compact('data', 'slug'))->render();
    }
    public function getCarCategoryBySlug($slug, SlugInterface $slugRepository)
    {
        $slug = $slugRepository->getFirstBy(['key' => $slug, 'reference_type' => CarCategory::class]);
        if (!$slug) {
            abort(404);
        }
        $data = $this->carCategoryRepository->getFirstBy(['id' => $slug->reference_id]);

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

        return \Theme::scope('pages/business/product/product-detail', compact('data'))->render();
    }

    public function getCarSelection($car)
    {
        if (!$car) {
            abort(404);
        }

        $data['car'] = get_car_by_slug($car);
        if (blank($data)) {
            abort(404);
        }

        $meta = \MetaBox::getMetaData($data['car'], 'seo_meta', true);
        \SeoHelper::setTitle(isset($meta['seo_title']) ? $meta['seo_title'] : $data['car']->name)
            ->setDescription((isset($meta['seo_description']) ? $meta['seo_description'] : $data['car']->description) ?: theme_option('site_description'))
            ->openGraph()
            ->setImage(\RvMedia::getImageUrl(@$data['car']->image, 'og', false, \RvMedia::getImageUrl(theme_option('seo_og_image'))))
            ->addProperties(
                [
                    'image:width' => '1200',
                    'image:height' => '630'
                ]
            );

        return \Theme::scope('car-selection', $data)->render();
    }
}
