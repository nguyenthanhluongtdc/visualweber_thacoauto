<?php

namespace Platform\Car\Forms;

use Platform\Base\Forms\FormAbstract;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Car\Http\Requests\ColorRequest;
use Platform\Car\Models\Color;

class ColorForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        $this
            ->setupModel(new Color)
            ->setValidatorClass(ColorRequest::class)
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
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                ],
            ])
            ->add('code', 'color', [
                'label'      => trans('Màu sắc'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'class'  => "col-1 form-control",
                ],
            ])
            // ->add('code', 'text', [
            //     'label'      => trans('Color code'),
            //     'label_attr' => ['class' => 'control-label'],
            //     'attr'       => [
            //         'placeholder'  => trans('core/base::forms.name_placeholder'),
            //         'data-counter' => 120,
            //     ],
            // ])
            ->add('status', 'customSelect', [
                'label'      => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => BaseStatusEnum::labels(),
            ])
            ->add('car_id', 'customSelect', [
                'label'      => trans('Car'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => \Platform\Car\Models\Car::pluck('name','id')->toArray(),
            ])
            ->add('image', 'mediaImage', [
                'label'      => __('Image'),
                'label_attr' => ['class' => 'control-label'],
            ])
            ->setBreakFieldPoint('status');
    }
}
