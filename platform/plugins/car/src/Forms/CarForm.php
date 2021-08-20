<?php

namespace Platform\Car\Forms;

use Platform\Base\Forms\FormAbstract;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Car\Http\Requests\CarRequest;
use Platform\Car\Models\Car;
use Platform\Car\Models\CarLine;
use Platform\Car\Repositories\Interfaces\CarLineInterface;

class CarForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        $list = get_cars();

        $cars = [];
        foreach ($list as $row) {
            if ($this->getModel() && ($this->model->id === $row->id || $this->model->id === $row->parent_id)) {
                continue;
            }

            $cars[$row->id] = $row->indent_text . ' ' . $row->name;
        }
        $cars = [0 => __('Chọn dòng xe')] + $cars;
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
            ->add('parent_id', 'customSelect', [
                'label'      => trans('core/base::forms.parent'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'class' => 'select-search-full',
                ],
                'choices'    => $cars,
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
            ->add('content', 'editor', [
                'label'      => trans('core/base::forms.content'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'rows'            => 4,
                    'placeholder'     => trans('core/base::forms.description_placeholder'),
                    'with-short-code' => true,
                ],
            ])
            ->add('car_line_id', 'customSelect', [
                'label'      => __('Loại xe'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => ['' => 'Lựa chọn loại xe'] + app(CarLineInterface::class)->advancedGet([
                    "condition" => [
                        "status" => BaseStatusEnum::PUBLISHED
                    ]
                ])->pluck('name', 'id')->toArray() ?? [],
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
            ->add('image', 'mediaImage', [
                'label'      => trans('core/base::forms.image') . ' (810x445)',
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('order', 'number', [
                'label'         => trans('core/base::forms.order'),
                'label_attr'    => ['class' => 'control-label'],
                'attr'          => [
                    'placeholder' => trans('core/base::forms.order_by_placeholder'),
                ],
                'default_value' => 0,
            ])
            ->setBreakFieldPoint('status');
    }
}
