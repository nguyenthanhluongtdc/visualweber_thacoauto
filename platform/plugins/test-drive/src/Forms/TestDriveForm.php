<?php

namespace Platform\TestDrive\Forms;

use Assets;
use Platform\Base\Forms\FormAbstract;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\TestDrive\Http\Requests\TestDriveRequest;
use Platform\TestDrive\Models\TestDrive;

class TestDriveForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        Assets::addScriptsDirectly('vendor/core/plugins/contact/js/contact.js')
            ->addStylesDirectly('vendor/core/plugins/contact/css/contact.css');

        $this
            ->setupModel(new TestDrive)
            ->setValidatorClass(TestDriveRequest::class)
            ->withCustomFields()
            ->add('status', 'customSelect', [
                'label'      => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => BaseStatusEnum::labels(),
            ])
            ->setBreakFieldPoint('status')
            ->addMetaBoxes([
                'information' => [
                    'title'      => trans('plugins/contact::contact.contact_information'),
                    'content'    => view('plugins/test-drive::contact-info', ['contact' => $this->getModel()])->render(),
                    'attributes' => [
                        'style' => 'margin-top: 0',
                    ],
                ],
            ]);
    }
}
