<?php

namespace Platform\Tenant\Forms;

use Platform\Base\Forms\FormAbstract;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Tenant\Http\Requests\TenantRequest;
use Platform\Tenant\Models\Tenant;

class TenantForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        $regions = is_plugin_active('location') ? get_cities() : [];

        $regions = ['' =>  __("Chọn khu vực")] + $regions;

        $this
            ->setupModel(new Tenant)
            ->setValidatorClass(TenantRequest::class)
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
            ->add('brand_id', 'customSelect', [
                'label'      => trans('Brand'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => get_brands()->where('parent_id',0)->where('parent_id','')->pluck('name','id')->prepend('NULL','')->toArray(),
                'help_block' => [
                    'text' => 'Lựa chọn nếu muốn quản lý thương hiệu xe'
                ]
            ])
            ->add('country_id', 'customSelect', [
                'label'      => trans('Country'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => $regions,
                'help_block' => [
                    'text' => 'Lựa chọn nếu muốn quản lý tin tức của tỉnh thành',
                ]
            ])
            ->setBreakFieldPoint('status');
    }
}
