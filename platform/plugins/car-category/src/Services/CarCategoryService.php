<?php

namespace Platform\CarCategory\Services;

use Platform\Base\Enums\BaseStatusEnum;
use Platform\SeoHelper\SeoOpenGraph;
use Eloquent;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Platform\CarCategory\Models\CarCategory;
use Platform\CarCategory\Repositories\Interfaces\CarCategoryInterface;
use RvMedia;
use SeoHelper;
use Theme;

class CarCategoryService
{
    /**
     * @param Eloquent $slug
     * @return array|Eloquent
     */
    public function handleFrontRoutes($slug)
    {
        if (!$slug instanceof Eloquent) {
            return $slug;
        }

        $condition = [
            'id'     => $slug->reference_id,
            'status' => BaseStatusEnum::PUBLISHED,
        ];

        if (Auth::check() && request()->input('preview')) {
            Arr::forget($condition, 'status');
        }

        switch ($slug->reference_type) {
            case CarCategory::class:
                $data = app(CarCategoryInterface::class)
                    ->getFirstBy(
                        $condition,
                        ['*'],
                    );

                if (empty($data)) {
                    abort(404);
                }

                SeoHelper::setTitle($data->name)
                    ->setDescription($data->description);

                $meta = new SeoOpenGraph;
                if ($data->image) {
                    $meta->setImage(RvMedia::getImageUrl($data->image));
                }
                $meta->setDescription($data->description);
                $meta->setUrl($data->url);
                $meta->setTitle($data->name);
                $meta->setType('article');

                SeoHelper::setSeoOpenGraph($meta);

                if (function_exists('admin_bar') && Auth::check() && Auth::user()->hasPermission('car-category.edit')) {
                    admin_bar()->registerLink(
                        trans('plugins/blog::posts.edit_this_post'),
                        route('car-category.edit', $data->id)
                    );
                }

                Theme::breadcrumb()->add(__('Home'), route('public.index'));

                do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, POST_MODULE_SCREEN_NAME, $data);

                Theme::breadcrumb()->add(SeoHelper::getTitle(), $data->url);

                return [
                    'view'         => 'pages/business/product/product-detail',
                    'default_view' => 'pages/business/product/product-detail',
                    'data'         => compact('data'),
                    'slug'         => $data->slug,
                ];
        }

        return $slug;
    }
}
