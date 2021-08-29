<?php

namespace Platform\DistributionSystem\Forms;

use Platform\Base\Forms\FormAbstract;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Brand\Repositories\Interfaces\BrandInterface;
use Platform\CarCategory\Repositories\Interfaces\CarCategoryInterface;
use Platform\DistributionSystem\Http\Requests\ShowroomBrandRequest;
use Platform\DistributionSystem\Models\ShowroomBrand;
use Platform\DistributionSystem\Repositories\Interfaces\ShowroomBrandInterface;
use Platform\DistributionSystem\Repositories\Interfaces\ShowroomInterface;

class ShowroomBrandForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        $showrooms = app(ShowroomInterface::class)
            ->advancedGet([
                "condition" => [
                    "status" => BaseStatusEnum::PUBLISHED
                ],
                "select" => ["id", "name"]
            ])->pluck('name', 'id')->toArray() ?? [];

        $showrooms = ["" => "Chọn đại lý"] + $showrooms;

        $brands = app(BrandInterface::class)
            ->advancedGet([
                "condition" => [
                    "status" => BaseStatusEnum::PUBLISHED,
                ],
                "select" => ["id", "name"]
            ])->pluck('name', 'id')->toArray() ?? [];

        $brands = ["" => "Chọn thương hiệu"] + $brands;

        $categories = app(CarCategoryInterface::class)
            ->advancedGet([
                "condition" => [
                    "status" => BaseStatusEnum::PUBLISHED,
                    ["parent_id", "!=", 0]
                ],
                "select" => ["id", "name"]
            ])->pluck('name', 'id')->toArray() ?? [];

        $categories = ["" => "Chọn loại xe"] + $categories;

        $this
            ->setupModel(new ShowroomBrand)
            ->setValidatorClass(ShowroomBrandRequest::class)
            ->withCustomFields()
            ->add('showroom_id', 'customSelect', [
                'label'      => __('Đại lý'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => $showrooms,
                'attr'       => [
                    'class' => 'form-control select-search-full',
                ]
            ])
            ->add('brand_id', 'customSelect', [
                'label'      => __('Thương hiệu'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => $brands,
                'attr'       => [
                    'class' => 'form-control select-search-full',
                ]
            ])
            ->add('category_id', 'customSelect', [
                'label'      => __('Loại xe'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => $categories,
                'attr'       => [
                    'class' => 'form-control select-search-full',
                ]
            ])
            ->add('status', 'customSelect', [
                'label'      => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => BaseStatusEnum::labels(),
            ])
            ->setBreakFieldPoint('status');
    }
}
