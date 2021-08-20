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
            'id'         => 'twitter',
            'section_id' => 'opt-text-subsection-social',
            'type'       => 'text',
            'label'      => 'Twitter',
            'attributes' => [
                'name'    => 'twitter',
                'value'   => null,
                'options' => [
                    'class'       => 'form-control',
                    'placeholder' => 'https://twitter.com/@username',
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
            'helper'     => __('To show chat box on that website, please go to :link and add :domain to whitelist domains!',
                [
                    'domain' => Html::link(url('')),
                    'link'   => Html::link('https://www.facebook.com/' . theme_option('facebook_page_id') . '/settings/?tab=messenger_platform'),
                ]),
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
        ->setSection([ // Set section with no field
            'title' => __('Sản xuất - kinh doanh ô tô & cơ khí'),
            'desc' => __('Sản xuất - kinh doanh ô tô & cơ khí settings'),
            'id' => 'opt-text-subsection-manufacturing_business',
            'subsection' => true,
            'icon' => 'fa fa-home',
            'fields' => [
                [
                    'id' => 'image_manufacturing',
                    'type' => 'mediaImage',
                    'label' => __('Ảnh Sản xuất'),
                    'attributes' => [
                        'name' => 'image_manufacturing',
                        'value' => null,
                    ],
                ],
                [
                    'id' => 'name_manufacturing',
                    'type' => 'text',
                    'label' => __('Tên Sản xuất'),
                    'attributes' => [
                        'name' => 'name_manufacturing',
                        'value' => null,
                    ],
                ],
                [
                    'id' => 'description_manufacturing',
                    'type' => 'textarea',
                    'label' => __('Mô tả Sản xuất'),
                    'attributes' => [
                        'name' => 'description_manufacturing',
                        'value' => null,
                    ],
                ],
            ],
        ])
        ->setField([
            'id'         => 'image_business',
            'section_id' => 'opt-text-subsection-manufacturing_business',
            'type'       => 'mediaImage',
            'label'      => __('Ảnh kinh doanh'),
            'attributes' => [
                'name'    => 'image_business',
                'value'   => null,
            ],
        ])
        ->setField([
            'id'         => 'name_business',
            'section_id' => 'opt-text-subsection-manufacturing_business',
            'type'       => 'text',
            'label'      => __('Tên kinh doanh'),
            'attributes' => [
                'name'    => 'name_business',
                'value'   => null,
            ],
        ])
        ->setField([
            'id'         => 'description_business',
            'section_id' => 'opt-text-subsection-manufacturing_business',
            'type'       => 'textarea',
            'label'      => __('Mô tả kinh doanh'),
            'attributes' => [
                'name'    => 'description_business',
                'value'   => null,
            ],
        ])
        // ->setField([ // Set field for section
        //     'id' => 'section_manufacturing',
        //     'section_id' => 'opt-text-subsection-manufacturing_business',
        //     'type' => 'text',
        //     'label' => __('Copyright'),
        //     'attributes' => [
        //         'name' => 'section_manufacturing',
        //         'value' => '© 2016 Botble Technologies. All right reserved.',
        //         'options' => [
        //             'class' => 'form-control',
        //             'placeholder' => __('Change copyright'),
        //             'data-counter' => 120,
        //         ]
        //     ],
        //     'helper' => __('Copyright on footer of site'),
        // ])
        ->setField([
            'id'         => 'repeater_munufacturing',
            'section_id' => 'opt-text-subsection-manufacturing_business',
            'type'       => 'repeater',
            'label'      => __('Repeater manufacturing'),
            'attributes' => [
                'name'   => 'repeater_munufacturing',
                'value'  => null,
                'fields' => [
                    [
                        'type'       => 'mediaImage',
                        'label'      => __('Image'),
                        'attributes' => [
                            'name'  => 'image',
                            'value' => null,
                        ],
                    ],
                    [
                        'type'       => 'textarea',
                        'label'      => __('Description'),
                        'attributes' => [
                            'name'    => 'description',
                            'value'   => null,
                            'options' => [
                                'class'        => 'form-control',
                                'data-counter' => 255,
                                'rows'         => 3,
                            ],
                        ],
                    ],
                ],
            ],
        ])->setField([
            'id'         => 'repeater_business',
            'section_id' => 'opt-text-subsection-manufacturing_business',
            'type'       => 'repeater',
            'label'      => __('Repeater business'),
            'attributes' => [
                'name'   => 'repeater_business',
                'value'  => null,
                'fields' => [
                    [
                        'type'       => 'mediaImage',
                        'label'      => __('Image'),
                        'attributes' => [
                            'name'  => 'image',
                            'value' => null,
                        ],
                    ],
                    [
                        'type'       => 'textarea',
                        'label'      => __('Description'),
                        'attributes' => [
                            'name'    => 'description',
                            'value'   => null,
                            'options' => [
                                'class'        => 'form-control',
                                'data-counter' => 255,
                                'rows'         => 3,
                            ],
                        ],
                    ],
                ],
            ],
        ])->setSection([ // Set section with no field
            'title' => __('Tiêu chí 8T'),
            'desc' => __('Tiêu chí 8T settings'),
            'id' => 'opt-text-subsection-criteria',
            'subsection' => true,
            'icon' => 'fa fa-home',
        ])->setField([
            'id'         => 'repeater_criteria',
            'section_id' => 'opt-text-subsection-criteria',
            'type'       => 'repeater',
            'label'      => __('Bộ lập tiêu chí'),
            'attributes' => [
                'name'   => 'repeater_criteria',
                'value'  => null,
                'fields' => [
                    [
                        'type'       => 'mediaImage',
                        'label'      => __('Image large'),
                        'attributes' => [
                            'name'  => 'image_criteria',
                            'value' => null,
                        ],
                    ],
                    [
                        'type'       => 'mediaImage',
                        'label'      => __('Symbol'),
                        'attributes' => [
                            'name'  => 'symbol_criteria',
                            'value' => null,
                        ],
                    ],
                    [
                        'type'       => 'text',
                        'label'      => __('Name'),
                        'attributes' => [
                            'name'  => 'name_criteria',
                            'value' => null,
                            'data-counter' => 50,
                        ],
                    ],
                    [
                        'type'       => 'textarea',
                        'label'      => __('Description'),
                        'attributes' => [
                            'name'    => 'description_criteria',
                            'value'   => null,
                            'options' => [
                                'class'        => 'form-control',
                                'data-counter' => 150,
                                'rows'         => 3,
                            ],
                        ],
                    ],
                ],
            ],
        ]);
});
