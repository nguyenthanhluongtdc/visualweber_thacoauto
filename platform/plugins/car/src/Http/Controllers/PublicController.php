<?php

namespace Platform\Car\Http\Controllers;

use Platform\Base\Enums\BaseStatusEnum;
use Platform\Brand\Models\Brand;
use Platform\CarCategory\Models\CarCategory;
use Platform\Base\Http\Controllers\BaseController;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Brand\Repositories\Interfaces\BrandInterface;
use Platform\Car\Repositories\Interfaces\AccessoryInterface;
use Platform\Car\Repositories\Interfaces\CarInterface;
use Platform\Car\Repositories\Interfaces\ColorInterface;
use Platform\Car\Repositories\Interfaces\EquipmentInterface;
use Platform\Slug\Repositories\Interfaces\SlugInterface;
use Platform\CarCategory\Repositories\Interfaces\CarCategoryInterface;
use Platform\MoreConsultancy\Repositories\Interfaces\MoreConsultancyInterface;
use Platform\Promotions\Repositories\Interfaces\PromotionsInterface;

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

    public function getCar($car)
    {
        if (!$car) {
            abort(404);
        }

        $result = get_car_by_slug($car);
        if (blank($result)) {
            abort(404);
        }

        $meta = \MetaBox::getMetaData($result, 'seo_meta', true);
        \SeoHelper::setTitle(isset($meta['seo_title']) ? $meta['seo_title'] : $result->name)
            ->setDescription((isset($meta['seo_description']) ? $meta['seo_description'] : $result->description) ?: theme_option('site_description'))
            ->openGraph()
            ->setImage(\RvMedia::getImageUrl(@$result->image, 'og', false, \RvMedia::getImageUrl(theme_option('seo_og_image'))))
            ->addProperties(
                [
                    'image:width' => '1200',
                    'image:height' => '630'
                ]
            );

        return $result;
    }

    public function getCarSelection($car)
    {
        $data['car'] = $this->getCar($car);
        return \Theme::scope('car-selection', $data)->render();
    }

    public function getCostEstimate(
        $car,
        PromotionsInterface $promotionsInterface,
        MoreConsultancyInterface $moreConsultancyInterface,
        ColorInterface $colorInterface,
        AccessoryInterface $accessoryInterface,
        EquipmentInterface $equipmentInterface
    ) {
        $data['car'] = $this->getCar($car);
        $dataPromotions = $promotionsInterface->getModel()
            ->whereHas('cars', function ($q) use ($data) {
                $q->where('app_cars.id', $data['car']->id);
            })
            ->where('status', BaseStatusEnum::PUBLISHED)
            ->orderBy('order', 'desc')
            ->orderBy('created_at', 'desc');

        $data['promotions'] = $promotionsInterface->applyBeforeExecuteQuery($dataPromotions)->get();
        $data['consultancies'] = $moreConsultancyInterface->advancedGet([
            "condition" => [
                "status" => BaseStatusEnum::PUBLISHED
            ],
            "select" => ['*'],
            "order_by" => [
                "order" => "desc",
                "created_at" => "desc"
            ]
        ]);

        if (request('color')) {
            $data['color'] = $colorInterface->getFirstBy(['id' => request('color')]);
        }

        if (request('accessories') && is_array(request('accessories'))) {
            $data['accessories'] = $accessoryInterface->advancedGet([
                "condition" => [
                    ["id", "IN", request('accessories')]
                ],
                "select" => ["*"]
            ]);
        }

        if (request('promotions') && is_array(request('promotions'))) {
            $data['promotionsArray'] = $promotionsInterface->advancedGet([
                "condition" => [
                    ["id", "IN", request('promotions')]
                ],
                "select" => ["*"]
            ]);
        }

        if (request('equipments') && is_array(request('equipments'))) {
            $data['equipments'] = $equipmentInterface->advancedGet([
                "condition" => [
                    ["id", 'IN', request('equipments')]
                ],
                'select' => ["*"]
            ]);
        }

        return \Theme::scope('cost-estimates', $data)->render();
    }

    public function getDeposit(
        $car,
        PromotionsInterface $promotionsInterface,
        MoreConsultancyInterface $moreConsultancyInterface,
        ColorInterface $colorInterface,
        AccessoryInterface $accessoryInterface,
        EquipmentInterface $equipmentInterface
    ) {

        $rules = [
            'city'=> 'required',
            'type_payment' => 'required',
        ];

        $customMessage = [
            'city.required' => __('* Vui lòng chọn tỉnh thành'),
            'type_payment.required' => __('* Vui lòng chọn phương thức thanh toán')
        ];

        $this->validate(request(), $rules, $customMessage);

        $data['car'] = $this->getCar($car);

        $dataPromotions = $promotionsInterface->getModel()
            ->whereHas('cars', function ($q) use ($data) {
                $q->where('app_cars.id', $data['car']->id);
            })
            ->where('status', BaseStatusEnum::PUBLISHED)
            ->orderBy('order', 'desc')
            ->orderBy('created_at', 'desc');

        $data['promotions'] = $promotionsInterface->applyBeforeExecuteQuery($dataPromotions)->get();
        $data['consultancies'] = $moreConsultancyInterface->advancedGet([
            "condition" => [
                "status" => BaseStatusEnum::PUBLISHED
            ],
            "select" => ['*'],
            "order_by" => [
                "order" => "desc",
                "created_at" => "desc"
            ]
        ]);

        if (request('color')) {
            $data['color'] = $colorInterface->getFirstBy(['id' => request('color')]);
        }

        if (request('accessories') && is_array(request('accessories'))) {
            $data['accessories'] = $accessoryInterface->advancedGet([
                "condition" => [
                    ["id", "IN", request('accessories')]
                ],
                "select" => ["*"]
            ]);
        }
        if (request('promotions') && is_array(request('promotions'))) {
            $data['promotionsArray'] = $promotionsInterface->advancedGet([
                "condition" => [
                    ["id", "IN", request('promotions')]
                ],
                "select" => ["*"]
            ]);
        }

        if (request('equipments') && is_array(request('equipments'))) {
            $data['equipments'] = $equipmentInterface->advancedGet([
                "condition" => [
                    ["id", 'IN', request('equipments')]
                ],
                'select' => ["*"]
            ]);
        }

        return \Theme::scope('deposit', $data)->render();
    }

    public function getCarOptions(BaseHttpResponse $response, CarInterface $carInterface)
    {
        $car = $carInterface->getFirstBy(['id' => request('car_id')]);
        if (!$car) {
            return $response->setData([
                "template" => \Theme::partial('templates.no-content')
            ]);
        }

        $template = \Theme::partial('templates.car-selection.step-first', ['car' => $car, 'request' => request()]);

        return $response->setData([
            "template" => $template,
            "data" => $car
        ]);
    }

    public function testDrive($car)
    {
        $data['car'] = $this->getCar($car);
        return \Theme::scope('test-drive', $data)->render();
    }
}
