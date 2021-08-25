<?php

namespace Platform\DistributionSystem\Forms;

use Platform\Base\Forms\FormAbstract;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\DistributionSystem\Http\Requests\DistributionSystemRequest;
use Platform\DistributionSystem\Models\DistributionSystem;
use Platform\Location\Repositories\Interfaces\CityInterface;

class DistributionSystemForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        $regions = ['' => '-- Chọn khu vực --'] + (app(CityInterface::class)->advancedGet([
            'condition' => [
                'status' => BaseStatusEnum::PUBLISHED
            ],
            'select' => ['id', 'name']
        ])->pluck('name', 'id')->toArray() ?? []);

        $this
            ->setupModel(new DistributionSystem)
            ->setValidatorClass(DistributionSystemRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label'      => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('description', 'textarea', [
                'label'      => trans('core/base::forms.description'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'rows'         => 4,
                    'placeholder'  => trans('core/base::forms.description_placeholder'),
                    'data-counter' => 400,
                ],
            ])
            ->add('status', 'customSelect', [
                'label'      => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => BaseStatusEnum::labels(),
            ])
            ->add('city_id', 'customSelect', [
                'label'      => __('Khu vực'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => $regions,
                'attr'       => [
                    'class' => 'form-control select-search-full',
                ]
            ])
            ->setBreakFieldPoint('status');
    }
}
