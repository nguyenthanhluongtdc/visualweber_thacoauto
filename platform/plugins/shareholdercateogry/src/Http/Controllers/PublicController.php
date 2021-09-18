<?php

namespace Platform\Shareholdercateogry\Http\Controllers;



use Illuminate\Http\Request;
use Platform\Base\Http\Controllers\BaseController;
use Platform\Slug\Repositories\Interfaces\SlugInterface;
use Platform\Shareholdercateogry\Models\Shareholdercateogry;
use Platform\Shareholdercateogry\Repositories\Interfaces\ShareholdercateogryInterface;


class PublicController extends BaseController
{
    public function getShareholdercateogryBySlug($slug, SlugInterface $slugRepository)
    {
        $slug = $slugRepository->getFirstBy(['key' => $slug, 'reference_type' => Shareholdercateogry::class]);
        if (!$slug) {
            abort(404);
        }
        $data = $this->app(ShareholdercateogryInterface::class)->getFirstBy(['id' => $slug->reference_id]);

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

        return \Theme::scope('shareholder-category', compact('data', 'slug'))->render();
    }
}
