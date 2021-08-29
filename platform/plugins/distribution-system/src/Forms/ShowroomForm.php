<?php

namespace Platform\DistributionSystem\Forms;

use Platform\Base\Forms\FormAbstract;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\DistributionSystem\Http\Requests\ShowroomRequest;
use Platform\DistributionSystem\Models\Showroom;

class ShowroomForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        $ditributions = get_distribution_systems()
            ->pluck('name', 'id')->toArray() ?? [];
        $ditributions = ["" => "Chọn hệ thống phân phối"] + $ditributions;

        $this
            ->setupModel(new Showroom)
            ->setValidatorClass(ShowroomRequest::class)
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
            ->add('distribution_system_id', 'customSelect', [
                'label'      => __('Hệ thống phân phối'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => $ditributions,
                'attr'       => [
                    'class' => 'form-control select-search-full',
                ]
            ])
            ->setBreakFieldPoint('status');
    }
}
