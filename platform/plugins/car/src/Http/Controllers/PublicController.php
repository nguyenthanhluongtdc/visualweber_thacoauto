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

        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, BRAND_MODULE_SCREEN_NAME, $data);

        return \Theme::scope('pages/business/brand-detail/index', compact('data'))->render();
    }
}
