<?php

namespace Platform\Promotions\Forms;

use Platform\Base\Forms\FormAbstract;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Promotions\Forms\Fields\CarMultiField;
use Platform\Promotions\Http\Requests\PromotionsRequest;
use Platform\Promotions\Models\Promotions;

class PromotionsForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        if (!$this->formHelper->hasCustomField('carMulti')) {
            $this->formHelper->addCustomField('carMulti', CarMultiField::class);
        }

        $selectedCars = [];
        if ($this->getModel()) {
            $selectedCars = $this->getModel()->cars()->pluck('app_cars.id')->all();
        }

        $this
            ->setupModel(new Promotions)
            ->setValidatorClass(PromotionsRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label'      => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('description', 'editor', [
                'label'      => trans('core/base::forms.content'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'rows'            => 4,
                    'placeholder'     => trans('core/base::forms.description_placeholder'),
                    'with-short-code' => true,
                ],
            ])
            ->add('order', 'number', [
                'label'         => trans('core/base::forms.order'),
                'label_attr'    => ['class' => 'control-label'],
                'attr'          => [
                    'placeholder' => trans('core/base::forms.order_by_placeholder'),
                ],
                'default_value' => 0,
            ])
            ->add('cars[]', 'carMulti', [
                'label'      => 'D??ng xe',
                'label_attr' => ['class' => 'control-label required'],
                'choices'    => get_cars_with_children(),
                'value'      => old('cars', $selectedCars),
            ])
            ->add('rowClose1', 'html', [
                'html' => '</div>',
            ]);
            $this
            ->add('rowOpen1', 'html', [
                'html' => '<div class="row">',
            ])
            ->add('discount_percent', 'number', [
                'label'      => trans('Gi???m gi?? theo %'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper'    => [
                    'class' => 'form-group col-md-2',
                ],
                'attr'          => [
                    'max' => 100,
                    'min' => 0,
                ],
                'default_value' => 0,
            ])
            ->add('max_discount', 'number', [
                'label'      => trans('Gi???m t???i ??a'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper'    => [
                    'class' => 'form-group col-md-5',
                ],
                'attr'          => [
                    'min' => 0,
                ],
                'default_value' => 0,
            ])
            ->add('direct_discount', 'number', [
                'label'      => trans('Gi???m tr???c ti???p'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper'    => [
                    'class' => 'form-group col-md-5',
                ],
                'attr'          => [
                    'min' => 0,
                ],
                'default_value' => 0,
            ]);
            $this
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
            ->setBreakFieldPoint('status');
    }
}
