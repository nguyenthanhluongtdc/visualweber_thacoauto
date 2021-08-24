<?php

app()->booted(function () {
    theme_option()
        ->setField([
            'id'         => 'primary_font',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'googleFonts',
            'label'      => __('Primary font'),
            'attributes' => [
                'name'  => 'primary_font',
                'value' => 'Roboto',
            ],
        ])
        ->setField([
            'id'         => 'primary_color',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'customColor',
            'label'      => __('Primary color'),
            'attributes' => [
                'name'  => 'primary_color',
                'value' => '#ff2b4a',
            ],
        ])
        ->setField([
            'id'         => 'site_description',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'textarea',
            'label'      => __('Site description'),
            'attributes' => [
                'name'    => 'site_description',
                'value'   => null,
                'options' => [
                    'class'        => 'form-control',
                    'data-counter' => 255,
                ],
            ],
        ])
        ->setField([
            'id'         => 'address',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Address'),
            'attributes' => [
                'name'    => 'address',
                'value'   => null,
                'options' => [
                    'class'        => 'form-control',
                    'data-counter' => 255,
                ],
            ],
        ])
        ->setField([
            'id'         => 'website',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'url',
            'label'      => __('Website'),
            'attributes' => [
                'name'    => 'website',
                'value'   => null,
                'options' => [
                    'class'        => 'form-control',
                    'data-counter' => 255,
                ],
            ],
        ])
        ->setField([
            'id'         => 'contact_email',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'email',
            'label'      => __('Email'),
            'attributes' => [
                'name'    => 'contact_email',
                'value'   => null,
                'options' => [
                    'class'        => 'form-control',
                    'data-counter' => 120,
                ],
            ],
        ])
        ->setSection([
            'title'      => __('Social'),
            'desc'       => __('Social links'),
            'id'         => 'opt-text-subsection-social',
            'subsection' => true,
            'icon'       => 'fa fa-share-alt',
        ])
        ->setField([
            'id'         => 'facebook',
            'section_id' => 'opt-text-subsection-social',
            'type'       => 'text',
            'label'      => 'Facebook',
            'attributes' => [
                'name'    => 'facebook',
                'value'   => null,
                'options' => [
                    'class'       => 'form-control',
                    'placeholder' => 'https://facebook.com/@username',
                ],
            ],
        ])
        ->setField([
            'id'         => 'linkedin',
            'section_id' => 'opt-text-subsection-social',
            'type'       => 'text',
            'label'      => 'Linkedin',
            'attributes' => [
                'name'    => 'linkedin',
                'value'   => null,
                'options' => [
                    'class'       => 'form-control',
                    'placeholder' => 'https://linkedin.com/@username',
                ],
            ],
        ])
        ->setField([
            'id'         => 'youtube',
            'section_id' => 'opt-text-subsection-social',
            'type'       => 'text',
            'label'      => 'Youtube',
            'attributes' => [
                'name'    => 'youtube',
                'value'   => null,
                'options' => [
                    'class'       => 'form-control',
                    'placeholder' => 'https://youtube.com/@channel-url',
                ],
            ],
        ])
        ->setField([
            'id'         => 'copyright',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Copyright'),
            'attributes' => [
                'name'    => 'copyright',
                'value'   => null,
                'options' => [
                    'class'        => 'form-control',
                    'placeholder'  => __('Change copyright'),
                    'data-counter' => 255,
                ],
            ],
            'helper'     => __('Copyright on footer of site'),
        ])
        ->setField([
            'id'         => 'facebook_chat_enabled',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'select',
            'label'      => __('Enable Facebook chat?'),
            'attributes' => [
                'name'    => 'facebook_chat_enabled',
                'list'    => [
                    'no'  => trans('core/base::base.no'),
                    'yes' => trans('core/base::base.yes'),
                ],
                'value'   => 'no',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
            'helper'     => __(
                'To show chat box on that website, please go to :link and add :domain to whitelist domains!',
                [
                    'domain' => Html::link(url('')),
                    'link'   => Html::link('https://www.facebook.com/' . theme_option('facebook_page_id') . '/settings/?tab=messenger_platform'),
                ]
            ),
        ])
        ->setField([
            'id'         => 'facebook_page_id',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Facebook page ID'),
            'attributes' => [
                'name'    => 'facebook_page_id',
                'value'   => null,
                'options' => [
                    'class' => 'form-control',
                ],
            ],
            'helper'     => __('You can get fan page ID using this site :link', ['link' => Html::link('https://findmyfbid.com')]),
        ])
        ->setField([
            'id'         => 'facebook_comment_enabled_in_post',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'select',
            'label'      => __('Enable Facebook comment in post detail page?'),
            'attributes' => [
                'name'    => 'facebook_comment_enabled_in_post',
                'list'    => [
                    'yes' => trans('core/base::base.yes'),
                    'no'  => trans('core/base::base.no'),
                ],
                'value'   => 'yes',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])

        ->setSection([
            'title'      => __('Footer address company'),
            'desc'       => __('Footer address company'),
            'id'         => 'footer-address-company',
            'subsection' => true,
            'icon'       => 'fa fa-building',
        ])
        ->setField([
            'id'         => 'logo-footer',
            'section_id' => 'footer-address-company',
            'type'       => 'mediaImage',
            'label'      => "Image logo footer",
            'attributes' => [
                'name'    => 'logo-footer',
                'value'   => null,

            ],
        ])

        ->setField([
            'id'         => 'name-company',
            'section_id' => 'footer-address-company',
            'type'       => 'textarea',
            'label'      =>  __('Name company'),
            'attributes' => [
                'name'    => 'name-company',
                'value'   => null,
                'options' => [
                    'class'        => 'form-control',
                    'data-counter' => 255,
                    'rows'         => 2,
                ],
            ],
        ])

        ->setField([
            'id'         => 'address-company',
            'section_id' => 'footer-address-company',
            'type'       => 'textarea',
            'label'      => __('Address company'),
            'attributes' => [
                'name'    => 'address-company',
                'value'   => null,
                'options' => [
                    'class'        => 'form-control',
                    'data-counter' => 255,
                    'rows'         => 2,
                ],
            ],
        ])
        ->setField([
            'id'         => 'tax-code-company',
            'section_id' => 'footer-address-company',
            'type'       => 'text',
            'label'      => __('Tax code company'),
            'attributes' => [
                'name'    => 'tax-code-company',
                'value'   => null,
            'options' => [
                'class' => 'form-control',
            ],
            ],
        ])
        ->setField([
            'id'         => 'hotline-contact',
            'section_id' => 'footer-address-company',
            'type'       => 'text',
            'label'      => __('Hotline'),
            'attributes' => [
                'name'    => 'hotline-contact',
                'value'   => null,
            'options' => [
                'class' => 'form-control',
            ],

            ],
        ])
        ->setField([
            'id'         => 'email-contact',
            'section_id' => 'footer-address-company',
            'type'       => 'text',
            'label'      => __('Email'),
            'attributes' => [
                'name'    => 'email-contact',
                'value'   => null,
            'options' => [
                'class' => 'form-control',
            ],
            ],
        ])
        ->setField([
            'id'         => 'fax-contact',
            'section_id' => 'footer-address-company',
            'type'       => 'text',
            'label'      => __('FAX'),
            'attributes' => [
                'name'    => 'fax-contact',
                'value'   => null,
            'options' => [
                'class' => 'form-control',
            ],
            ],
        ]);











        // ->setSection([ // Set section with no field
        //     'title' => __('Sản xuất - kinh doanh ô tô & cơ khí'),
        //     'desc' => __('Sản xuất - kinh doanh ô tô & cơ khí settings'),
        //     'id' => 'opt-text-subsection-manufacturing_business',
        //     'subsection' => true,
        //     'icon' => 'fa fa-home',
        //     'fields' => [
        //         [
        //             'id' => 'image_manufacturing',
        //             'type' => 'mediaImage',
        //             'label' => __('Ảnh Sản xuất'),
        //             'attributes' => [
        //                 'name' => 'image_manufacturing',
        //                 'value' => null,
        //             ],
        //         ],
        //         [
        //             'id' => 'name_manufacturing',
        //             'type' => 'text',
        //             'label' => __('Tên Sản xuất'),
        //             'attributes' => [
        //                 'name' => 'name_manufacturing',
        //                 'value' => null,
        //             ],
        //         ],
        //         [
        //             'id' => 'description_manufacturing',
        //             'type' => 'textarea',
        //             'label' => __('Mô tả Sản xuất'),
        //             'attributes' => [
        //                 'name' => 'description_manufacturing',
        //                 'value' => null,
        //                 'options' => [
        //                     'class'        => 'form-control',
        //                     'data-counter' => 255,
        //                     'rows'         => 2,
        //                 ],
        //             ],
        //         ],
        //     ],
        // ])
        // ->setField([
        //     'id'         => 'image_business',
        //     'section_id' => 'opt-text-subsection-manufacturing_business',
        //     'type'       => 'mediaImage',
        //     'label'      => __('Ảnh kinh doanh'),
        //     'attributes' => [
        //         'name'    => 'image_business',
        //         'value'   => null,
        //     ],
        // ])
        // ->setField([
        //     'id'         => 'name_business',
        //     'section_id' => 'opt-text-subsection-manufacturing_business',
        //     'type'       => 'text',
        //     'label'      => __('Tên kinh doanh'),
        //     'attributes' => [
        //         'name'    => 'name_business',
        //         'value'   => null,
        //     ],
        // ])
        // ->setField([
        //     'id'         => 'description_business',
        //     'section_id' => 'opt-text-subsection-manufacturing_business',
        //     'type'       => 'textarea',
        //     'label'      => __('Mô tả kinh doanh'),
        //     'attributes' => [
        //         'name'    => 'description_business',
        //         'value'   => null,
        //         'options' => [
        //             'class'        => 'form-control',
        //             'data-counter' => 255,
        //             'rows'         => 2,
        //         ],
        //     ],
        // ])
        // ->setField([
        //     'id'         => 'repeater_munufacturing',
        //     'section_id' => 'opt-text-subsection-manufacturing_business',
        //     'type'       => 'repeater',
        //     'label'      => __('Repeater manufacturing'),
        //     'attributes' => [
        //         'name'   => 'repeater_munufacturing',
        //         'value'  => null,
        //         'fields' => [
        //             [
        //                 'type'       => 'mediaImage',
        //                 'label'      => __('Image'),
        //                 'attributes' => [
        //                     'name'  => 'image',
        //                     'value' => null,
        //                 ],
        //             ],
        //             [
        //                 'type'       => 'textarea',
        //                 'label'      => __('Description'),
        //                 'attributes' => [
        //                     'name'    => 'description',
        //                     'value'   => null,
        //                     'options' => [
        //                         'class'        => 'form-control',
        //                         'data-counter' => 255,
        //                         'rows'         => 2,
        //                     ],
        //                 ],
        //             ],
        //         ],
        //     ],
        // ])->setField([
        //     'id'         => 'repeater_business',
        //     'section_id' => 'opt-text-subsection-manufacturing_business',
        //     'type'       => 'repeater',
        //     'label'      => __('Repeater business'),
        //     'attributes' => [
        //         'name'   => 'repeater_business',
        //         'value'  => null,
        //         'fields' => [
        //             [
        //                 'type'       => 'mediaImage',
        //                 'label'      => __('Image'),
        //                 'attributes' => [
        //                     'name'  => 'image',
        //                     'value' => null,
        //                 ],
        //             ],
        //             [
        //                 'type'       => 'textarea',
        //                 'label'      => __('Description'),
        //                 'attributes' => [
        //                     'name'    => 'description',
        //                     'value'   => null,
        //                     'options' => [
        //                         'class'        => 'form-control',
        //                         'data-counter' => 255,
        //                         'rows'         => 2,
        //                     ],
        //                 ],
        //             ],
        //         ],
        //     ],
        // ])





        ;
});
