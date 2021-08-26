<?php

namespace Platform\DistributionSystem\Forms;

use Platform\Base\Forms\FormAbstract;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\DistributionSystem\Http\Requests\CityProvinceRequest;
use Platform\DistributionSystem\Models\CityProvince;

class CityProvinceForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        $this
            ->setupModel(new CityProvince)
            ->setValidatorClass(CityProvinceRequest::class)
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
            ->setBreakFieldPoint('status');
    }
}
