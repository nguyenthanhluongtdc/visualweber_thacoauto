<?php

namespace Platform\Car\Forms;

use Platform\Base\Forms\FormAbstract;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Car\Http\Requests\CarRequest;
use Platform\Car\Models\Car;
use Platform\Blog\Forms\Fields\CategoryMultiField;

class CarForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        // Assets::addScripts(['input-mask']);
        $selectedShowrooms = [];
        if ($this->getModel()) {
            $selectedShowrooms = $this->getModel()->showrooms()->pluck('showroom_id')->all();
        }
        if (!$this->formHelper->hasCustomField('categoryMulti')) {
            $this->formHelper->addCustomField('categoryMulti', CategoryMultiField::class);
        }
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
                'label'      => trans('core/base::forms.description'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'placeholder'  => trans('Nhập mô tả'),
                ],
            ])
            ->add('horse_power', 'number', [
                'label'      => trans('plugins/car::car.horse-power-hp'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'placeholder'  => trans('Nhập thông số mã lực (Hp)'),
                    'data-counter' => 120,
                ],
            ])
            ->add('fuel_type', 'customSelect', [
                'label'      => trans('plugins/car::car.fuel-type'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => config('base.fuel_types',[]),
            ])
            ->add('gear', 'customSelect', [
                'label'      => trans('plugins/car::car.gear-type'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => config('base.gears',[]),
            ])
            ->add('fee', 'number', [
                'label'      => trans('plugins/car::car.fee'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'placeholder'  => trans('Nhập phí rước bạ'),
                ],
            ])
            ->add('fee_license_plate', 'number', [
                'label'      => trans('plugins/car::car.fee-license-plate'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'placeholder'  => trans('Nhập phí ra biển số'),
                ],
            ])
            ->add('promotion', 'number', [
                'label'      => trans('plugins/car::car.promotion'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'placeholder'  => trans('Nhập khuyến mãi giảm giá trực tiếp nếu có'),
                ],
            ])
            ->add('engine', 'number', [
                'label'      => trans('plugins/car::car.engine'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'placeholder'  => trans('Nhập số động cơ'),
                ],
            ])
            ->add('price', 'number', [
                'label'      => trans('plugins/car::car.price'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'placeholder'  => trans('Giá sản phẩm'),
                    'class' => 'form-control input-mask-number',
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
                'label'      => trans('plugins/car::car.brands'),
                'label_attr' => ['class' => 'control-label'],
                'choices'    => get_brands()->pluck('name','id')->prepend('NULL','')->toArray(),
            ])
            ->add('vehicle_id', 'customSelect', [
                'label'      => trans('plugins/car::car.vehicle'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => \Platform\Vehicle\Models\Vehicle::pluck('name','id')->prepend('NULL','')->toArray(),
            ])
            ->add('parent_id', 'customSelect', [
                'label'      => trans('Phiên bản cha'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => \Platform\Car\Models\Car::whereNull('parent_id')->pluck('name','id')->prepend('NULL','')->toArray(),
            ])
            ->add('showrooms[]', 'categoryMulti', [
                'label'      => trans('plugins/car::car.showroom'),
                'label_attr' => ['class' => 'control-label'],
                'choices'    => $this->getModel()->brand_id ? get_showroom_by_state(null,$this->getModel()->brand->slug) : [],
                'value'      => old('showrooms', $selectedShowrooms),
            ])
            ->add('image', 'mediaImage', [
                'label'      => __('Image').' (790x440px)',
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('brochure', 'mediaFile', [
                'label'      => __('Brochure'),
                'label_attr' => ['class' => 'control-label'],
            ])
            ->setBreakFieldPoint('status');
    }
}
