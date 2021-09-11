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
        $list = get_car_categories_parent();

        $categories = [];
        foreach ($list as $row) {
            if ($this->getModel() && ($this->model->id === $row->id || $this->model->id === $row->parent_id)) {
                continue;
            }

            $categories[$row->id] = $row->indent_text . ' ' . $row->name;
        }
        $categories = [0 => trans('plugins/blog::categories.none')] + $categories;


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
                'label'      => trans('core/base::forms.description'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                ],
            ])
            ->add('content', 'editor', [
                'label'      => trans('core/base::forms.content'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'     => trans('core/base::forms.description_placeholder'),
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
            ->add('parent_id', 'customSelect', [ // Change "select" to "customSelect" for better UI
                'label'      => trans('core/base::forms.parent'),
                'label_attr' => ['class' => 'control-label required'], // Add class "required" if that is mandatory field
                'attr'       => [
                    'class' => 'select-search-full',
                ],
                'choices'    =>$categories,
            ])
            ->setBreakFieldPoint('status');
    }
}
