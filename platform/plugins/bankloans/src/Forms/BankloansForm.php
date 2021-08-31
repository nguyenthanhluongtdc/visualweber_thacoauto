<?php

namespace Platform\Bankloans\Forms;

use Platform\AskType\Models\AskType;
use Platform\Bank\Models\Bank;
use Platform\Base\Forms\FormAbstract;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Bankloans\Http\Requests\BankloansRequest;
use Platform\Bankloans\Models\Bankloans;

class BankloansForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        $categories = Bank::whereStatus(BaseStatusEnum::PUBLISHED)
            ->get()
            ->pluck('name', 'id')
            ->toArray();
        $this
            ->setupModel(new Bankloans)
            ->setValidatorClass(BankloansRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label'      => 'Tên khoảng vay',
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 191,
                ],
            ])
            ->add('description', 'text', [
                'label'      => 'Mô tả ngắn',
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'placeholder'  => 'Mô tả',
                ],
            ])
            ->add(
                'bank_id',
                'select',
                [
                    'label' => trans('Lựa chọn ngân hàng'),
                    'label_attr' => ['class' => 'control-label'],
                    'choices' => ['' => 'Lựa chọn ngân hàng'] + $categories,
                    'attr' => [
                        'class' => 'form-control select-full',
                    ],

                ]
            )
            ->add('months', 'number', [
                'label'      => 'Tháng vay',
                'label_attr' => ['class' => 'control-label required' ],
                'attr'       => [
                    'placeholder'  => 'Nhập số',
                ],
            ])->add('interest_rate', 'number', [
                'label'      => 'Lãi suất(%)',
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => 'Theo phần trăm',
                ],
            ])->add('floating_rate', 'number', [
                'label'      => 'Lãi suất thả nổi(%)',
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => 'Theo phần trăm',
                ],
            ])->add('percent_loans', 'number', [
                'label'      => 'Số tiền vay cho phép đối với sản phẩm(%)',
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => 'Theo phần trăm',
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
