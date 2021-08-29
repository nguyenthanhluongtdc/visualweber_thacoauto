<?php

namespace Platform\DistributionSystem\Http\Controllers;

use Theme;
use Platform\Base\Http\Controllers\BaseController;
use Platform\DistributionSystem\Models\DistributionSystem;
use Platform\DistributionSystem\Repositories\Interfaces\DistributionSystemInterface;
use Platform\Service\Models\Service;
use Platform\Service\Repositories\Interfaces\ServiceInterface;
use Platform\Slug\Repositories\Interfaces\SlugInterface;

class PublicController extends BaseController
{
    protected $repository;

    public function __construct(DistributionSystemInterface $repository)
    {
        Theme::asset()->usePath()->add('reset_css', 'css/reset.css');
        $this->repository = $repository;
    }

    public function getBySlug($slug, SlugInterface $slugRepository)
    {
        $slug = $slugRepository->getFirstBy(['key' => $slug, 'reference_type' => DistributionSystem::class]);
        if (!$slug) {
            abort(404);
        }
        $data = $this->repository->getFirstBy(['id' => $slug->reference_id]);

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

        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, SERVICE_MODULE_SCREEN_NAME, $data);

        return Theme::scope('pages/distribution-system/detail', compact('data'))->render();
    }
}
