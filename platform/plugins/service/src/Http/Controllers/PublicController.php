<?php

namespace Platform\Service\Http\Controllers;

use Theme;
use Platform\Base\Http\Controllers\BaseController;
use Platform\Service\Models\Service;
use Platform\Service\Repositories\Interfaces\ServiceInterface;
use Platform\Slug\Repositories\Interfaces\SlugInterface;

class PublicController extends BaseController
{
    protected $serviceRepository;

    public function __construct(ServiceInterface $serviceRepository)
    {
        Theme::asset()->usePath()->add('reset_css', 'css/reset.css');
        $this->serviceRepository = $serviceRepository;
    }

    public function getBySlug($slug, SlugInterface $slugRepository)
    {
        $slug = $slugRepository->getFirstBy(['key' => $slug, 'reference_type' => Service::class]);
        if (!$slug) {
            abort(404);
        }
        $data = $this->serviceRepository->getFirstBy(['id' => $slug->reference_id]);

        if (!$data) {
            abort(404);
        }

        $meta = \MetaBox::getMetaData($data, 'seo_meta', true);
        \SeoHelper::setTitle($meta['seo_title'] ?: $data->name)
            ->setDescription($meta['seo_description'] ?: $data->description ?: theme_option('site_description'))
            ->openGraph()
            ->setImage(\RvMedia::getImageUrl(@$data->image, 'og', false, \RvMedia::getImageUrl(theme_option('seo_og_image'))))
            ->addProperties(
                [
                    'image:width' => '1200',
                    'image:height' => '630'
                ]
            );

        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, SERVICE_MODULE_SCREEN_NAME, $data);

        return Theme::scope('pages/services/service-detail', compact('data'))->render();
    }
}
