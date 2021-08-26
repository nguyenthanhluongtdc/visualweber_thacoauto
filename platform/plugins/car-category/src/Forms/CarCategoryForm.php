<?php

namespace Platform\CarCategory\Forms;

use Platform\Base\Forms\FormAbstract;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\CarCategory\Http\Requests\CarCategoryRequest;
use Platform\CarCategory\Models\CarCategory;

class CarCategoryForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        $rootCategory = CarCategory::whereNull('parent_id')->orWhere('parent_id',0)->pluck('name','id')->toArray();
        $rootCategory = array_merge($rootCategory,[0=>'Null']);
        $this
            ->setupModel(new CarCategory)
            ->setValidatorClass(CarCategoryRequest::class)
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
            ->add('status', 'customSelect', [
                'label'      => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => BaseStatusEnum::labels(),
            ])
            ->add('parent_id', 'select', [ // Change "select" to "customSelect" for better UI
                'label'      => __('Parent'),
                'label_attr' => ['class' => 'control-label'], // Add class "required" if that is mandatory field
                'choices'    =>$rootCategory,
            ])
            ->setBreakFieldPoint('status');
    }
}
