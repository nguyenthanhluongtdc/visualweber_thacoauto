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
            'id'         => 'facebook_icon',
            'section_id' => 'opt-text-subsection-social',
            'type'       => 'mediaImage',
            'label'      => 'Facebook Icon',
            'attributes' => [
                'name'    => 'facebook_icon',
                'value'   => null,
                'options' => [
                    'class'       => 'form-control',
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
            'id'         => 'linkedin_icon',
            'section_id' => 'opt-text-subsection-social',
            'type'       => 'mediaImage',
            'label'      => 'Linkedin Icon',
            'attributes' => [
                'name'    => 'linkedin_icon',
                'value'   => null,
                'options' => [
                    'class'       => 'form-control',
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
            'id'         => 'youtube_icon',
            'section_id' => 'opt-text-subsection-social',
            'type'       => 'mediaImage',
            'label'      => 'Youtube Icon',
            'attributes' => [
                'name'    => 'youtube_icon',
                'value'   => null,
                'options' => [
                    'class'       => 'form-control',
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
        ->setField([
            'id'         => 'language_switch_enabled',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'select',
            'label'      => __('Enable Language Switch?'),
            'attributes' => [
                'name'    => 'language_switch_enabled',
                'list'    => [
                    'no'  => trans('core/base::base.no'),
                    'yes' => trans('core/base::base.yes'),
                ],
                'value'   => 'no',
                'options' => [
                    'class' => 'form-control',
                ],
            ]
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
            'id'         => 'map-company',
            'section_id' => 'footer-address-company',
            'type'       => 'textarea',
            'label'      => __('Map company'),
            'attributes' => [
                'name'    => 'map-company',
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
        ])
        ->setSection([ // Set section with no field
            'title' => __('Contact'),
            'desc' => __('Contact'),
            'id' => 'opt-text-subsection-contact-form',
            'subsection' => true,
            'icon' => 'fa fa-home',
            'fields' => [
                [
                    'id' => 'image_contact',
                    'type' => 'mediaImage',
                    'label' => __('Ảnh'),
                    'attributes' => [
                        'name' => 'image_contact',
                        'value' => null,
                        'options' => [
                            'class'        => 'form-control',
                        ],
                    ],
                ],
                [
                    'id' => 'address_contact',
                    'type' => 'textarea',
                    'label' => __('Address'),
                    'attributes' => [
                        'name' => 'address_contact',
                        'value' => null,
                        'options' => [
                            'class'        => 'form-control',
                            'data-counter' => 255,
                            'rows'         => 2,
                        ],
                    ],
                ],
                [
                    'id' => 'phone_contact',
                    'type' => 'text',
                    'label' => __('số điện thoại'),
                    'attributes' => [
                        'name' => 'phone_contact',
                        'value' => null,
                        'options' => [
                            'class'        => 'form-control',
                        ],
                    ],
                ],
                [
                    'id' => 'email_contact',
                    'type' => 'text',
                    'label' => __('Email'),
                    'attributes' => [
                        'name' => 'email_contact',
                        'value' => null,
                        'options' => [
                            'class'        => 'form-control',
                        ],
                    ],
                ],
            ],
        ])->setField([
                'id'         => 'logo_footer',
                'section_id' => 'opt-text-subsection-logo',
                'type'       => 'mediaImage',
                'label'      => __('Logo footer'),
                'attributes' => [
                    'name'    => 'logo_footer',
                    'value'   => null,
                ],
        ])
        ->setField([
            'id'         => 'logo_bct',
            'section_id' => 'opt-text-subsection-social',
            'type'       => 'mediaImage',
            'label'      => __('Logo bộ công thương'),
            'attributes' => [
                'name'    => 'logo_bct',
                'value'   => null,
            ],
        ])
        ->setField([
            'id'         => 'link_bct',
            'section_id' => 'opt-text-subsection-social',
            'type'       => 'text',
            'label'      => __('Liên kết bộ công thương'),
            'attributes' => [
                'name'    => 'link_bct',
                'value'   => null,
                'option'=> [
                    'class' => 'form-control'
                ]
            ],
        ])
        ->setSection([ // Set section with no field
            'title' => __('Config default'),
            'desc' => __('Config defaults'),
            'id' => 'opt-text-subsection-config',
            'subsection' => true,
            'icon' => 'fa fa-wrench',
        ])
        ->setField([
            'id' => 'default_category_news',
            'section_id' => 'opt-text-subsection-config',
            'type' => 'select', // select or customSelect
            'label' => __('Loại tin tức mặc định'),
            'attributes' => [
                'name' => 'default_category_news',
                'data' => ["" => "Chọn loại"] + (is_plugin_active('blog') ? get_all_categories()->pluck('name', 'id')->toArray() ?? [] : []),
                'value' => null, // default value
                'options' => [
                    'class' => 'form-control select-full-search',
                ],
            ],
        ])
        ->setField([
            'id' => 'default_category_gallery',
            'section_id' => 'opt-text-subsection-config',
            'type' => 'select', // select or customSelect
            'label' => __('Loại video hình ảnh mặc định'),
            'attributes' => [
                'name' => 'default_category_gallery',
                'data' => ["" => "Chọn loại"] + (is_plugin_active('blog') ? get_all_categories()->pluck('name', 'id')->toArray() ?? [] : []),
                'value' => null, // default value
                'options' => [
                    'class' => 'form-control select-full-search',
                ],
            ],
        ])
        ->setField([
            'id' => 'default_category_news_summary',
            'section_id' => 'opt-text-subsection-config',
            'type' => 'select', // select or customSelect
            'label' => __('Loại điểm tin mặc định'),
            'attributes' => [
                'name' => 'default_category_news_summary',
                'data' => ["" => "Chọn loại"] + (is_plugin_active('blog') ? get_all_categories()->pluck('name', 'id')->toArray() ?? [] : []),
                'value' => null, // default value
                'options' => [
                    'class' => 'form-control select-full-search',
                ],
            ],
        ])->setSection([ // Set section with some fields
            'title' => __('Điều khoản'),
            'desc' => __('Điều khoản'),
            'id' => 'opt-text-subsection-provision',
            'subsection' => true,
            'icon' => 'fa fa-image',
        ])->setField([
            'id' => 'des_provision1',
            'section_id' => 'opt-text-subsection-provision',
            'type' => 'editor',
            'label' => __('Mô tả điều khoản').' 1',
            'attributes' => [
                'name' => 'des_provision1',
                'value' => null, // Default value
                'options' => [ // Optional
                    'class' => 'form-control theme-option-textarea',
                    'row' => '5',
                ],
            ],
        ])->setField([
            'id' => 'des_provision2',
            'section_id' => 'opt-text-subsection-provision',
            'type' => 'editor',
            'label' => __('Mô tả điều khoản').' 2',
            'attributes' => [
                'name' => 'des_provision2',
                'value' => null, // Default value
                'options' => [ // Optional
                    'class' => 'form-control theme-option-textarea',
                    'row' => '5',
                ],
            ],
        ])->setField([
            'id' => 'des_provision3',
            'section_id' => 'opt-text-subsection-provision',
            'type' => 'editor',
            'label' => __('Mô tả điều khoản').' 3',
            'attributes' => [
                'name' => 'des_provision3',
                'value' => null, // Default value
                'options' => [ // Optional
                    'class' => 'form-control theme-option-textarea',
                    'row' => '5',
                ],
            ],
        ]);

});
