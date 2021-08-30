<?php

namespace Platform\CarCategory\Http\Controllers;

use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\CarCategory\Services\CarCategoryService;
use Platform\CarCategory\Models\CarCategory;

class PublicController extends BaseController
{
    public function getCategory($slug, CarCategoryService $carCategoryService)
    {
        $slug = \SlugHelper::getSlug($slug, \SlugHelper::getPrefix(CarCategory::class, 'car-categories'));

        if (!$slug) {
            abort(404);
        }

        $data = $carCategoryService->handleFrontRoutes($slug);

        if (isset($data['slug']) && $data['slug'] !== $slug->key) {
            return redirect()->to(route('public.single', \SlugHelper::getPrefix(CarCategory::class, 'car-categories') . '/' . $data['slug']));
        }

        return \Theme::scope($data['view'], $data['data'], $data['default_view'])
            ->render();
    }
}
