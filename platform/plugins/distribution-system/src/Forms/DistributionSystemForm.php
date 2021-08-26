<?php

namespace Platform\DistributionSystem\Forms;

use Platform\Base\Forms\FormAbstract;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\DistributionSystem\Http\Requests\DistributionSystemRequest;
use Platform\DistributionSystem\Models\DistributionSystem;

class DistributionSystemForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        $regions = is_plugin_active('location') ? get_cities() : [];
        $regions = ['' =>  __("Chọn khu vực")] + $regions;
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
            ->add('status', 'customSelect', [
                'label'      => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => BaseStatusEnum::labels(),
            ])
            ->add('image', 'mediaImage', [
                'label'      => trans('core/base::forms.image') . ' (810x445)',
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('state_id', 'customSelect', [
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
