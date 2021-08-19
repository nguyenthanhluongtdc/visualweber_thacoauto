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

        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, SERVICE_MODULE_SCREEN_NAME, $data);

        dd($data);

        return Theme::scope('pages/services/service-detail', compact('data'))->render();
    }
}
