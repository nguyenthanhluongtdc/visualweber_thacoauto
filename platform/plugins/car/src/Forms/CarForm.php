<?php

namespace Platform\Car\Forms;

use Platform\Base\Forms\FormAbstract;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Car\Http\Requests\CarRequest;
use Platform\Car\Models\Car;

class CarForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        $this
            ->setupModel(new Car)
            ->setValidatorClass(CarRequest::class)
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
                'label'      => trans('Description'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                ],
            ])
            ->add('horse_power', 'number', [
                'label'      => trans('Horse power - HP'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('fuel_type', 'customSelect', [
                'label'      => trans('Fuel type'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => config('base.fuel_types',[]),
            ])
            ->add('gear', 'customSelect', [
                'label'      => trans('Gear type'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => config('base.gears',[]),
            ])
            ->add('fee', 'number', [
                'label'      => trans('Fee'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                ],
            ])
            ->add('fee_license_plate', 'number', [
                'label'      => trans('Fee license plate'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                ],
            ])
            ->add('promotion', 'number', [
                'label'      => trans('Promotion'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
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
            ->add('brand_id', 'customSelect', [
                'label'      => trans('Brands'),
                'label_attr' => ['class' => 'control-label'],
                'choices'    => get_brands()->pluck('name','id')->prepend('NULL','')->toArray(),
            ])
            ->add('vehicle_id', 'customSelect', [
                'label'      => trans('Vehicle'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => \Platform\Vehicle\Models\Vehicle::pluck('name','id')->prepend('NULL','')->toArray(),
            ])
            ->add('parent_id', 'customSelect', [
                'label'      => trans('Parent'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => \Platform\Car\Models\Car::whereNull('parent_id')->pluck('name','id')->prepend('NULL','')->toArray(),
            ])
            ->add('image', 'mediaImage', [
                'label'      => __('Image'),
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('brochure', 'mediaFile', [
                'label'      => __('Brochure'),
                'label_attr' => ['class' => 'control-label'],
            ])
            ->setBreakFieldPoint('status');
    }
}
