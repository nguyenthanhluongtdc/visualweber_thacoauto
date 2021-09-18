<?php

namespace Platform\Blog\Forms;

use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Forms\Fields\TagField;
use Platform\Base\Forms\FormAbstract;
use Platform\Blog\Forms\Fields\CategoryMultiField;
use Platform\Blog\Http\Requests\PostRequest;
use Platform\Blog\Models\Post;
use Platform\Blog\Repositories\Interfaces\CategoryInterface;
use Platform\Location\Repositories\Interfaces\CityInterface;

class PostForm extends FormAbstract
{

    /**
     * @var string
     */
    protected $template = 'core/base::forms.form-tabs';

    /**
     * {@inheritDoc}
     * @throws \Exception
     */
    public function buildForm()
    {
        $selectedCategories = [];
        if ($this->getModel()) {
            $selectedCategories = $this->getModel()->categories()->pluck('category_id')->all();
        }

        if (empty($selectedCategories)) {
            $selectedCategories = app(CategoryInterface::class)
                ->getModel()
                ->where('is_default', 1)
                ->pluck('id')
                ->all();
        }

        $tags = null;

        if ($this->getModel()) {
            $tags = $this->getModel()->tags()->pluck('name')->all();
            $tags = implode(',', $tags);
        }

        if (!$this->formHelper->hasCustomField('categoryMulti')) {
            $this->formHelper->addCustomField('categoryMulti', CategoryMultiField::class);
        }

        $regions = is_plugin_active('location') ? get_cities() : [];
        if(auth()->user()->tenant->country ?? false){
            $regions = [auth()->user()->tenant->country->id=>auth()->user()->tenant->country->name];
        }
        $regions = ['' =>  __("Chọn khu vực")] + $regions;

        $status = BaseStatusEnum::labels();
        if(auth()->user()->tenant->country ?? false){
            $index = array_search('published',array_keys($status));
            if($index !== false){
                array_splice($status,$index,1);
            }
        }
        $this
            ->setupModel(new Post)
            ->setValidatorClass(PostRequest::class)
            ->withCustomFields()
            ->addCustomField('tags', TagField::class)
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
                    'rows'         => 4,
                    'placeholder'  => trans('core/base::forms.description_placeholder'),
                    'data-counter' => 400,
                ],
            ])
            ->add('is_featured', 'onOff', [
                'label'         => trans('core/base::forms.is_featured'),
                'label_attr'    => ['class' => 'control-label'],
                'default_value' => false,
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
            ->add('is_featured_member', 'onOff', [
                'label'         => trans('plugins/blog::posts.is_featured_member'),
                'label_attr'    => ['class' => 'control-label'],
                'default_value' => false,
            ])
            ->add('featured_member_image', 'mediaImage', [
                'label'      => trans('plugins/blog::posts.featured_member_image') . ' (50x50px)',
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('status', 'customSelect', [
                'label'      => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'choices'    => $status ?? [],
                'selected'   => 'pending'

            ])
            ->add('categories[]', 'categoryMulti', [
                'label'      => trans('plugins/blog::posts.form.categories'),
                'label_attr' => ['class' => 'control-label required'],
                'choices'    => get_categories_with_children(),
                'value'      => old('categories', $selectedCategories),
            ])
            ->add('image', 'mediaImage', [
                'label'      => trans('core/base::forms.image') . ' (810x445)',
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('tag', 'tags', [
                'label'      => trans('plugins/blog::posts.form.tags'),
                'label_attr' => ['class' => 'control-label'],
                'value'      => $tags,
                'attr'       => [
                    'placeholder' => trans('plugins/blog::base.write_some_tags'),
                    'data-url'    => route('tags.all'),
                ],
            ])
            ->add('city_id', 'customSelect', [
                'label'      => __('Khu vực'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => $regions,
                'attr'       => [
                    'class' => 'form-control select-search-full',
                ]
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

        $postFormats = get_post_formats(true);

        if (count($postFormats) > 1) {
            $this->addAfter('status', 'format_type', 'customRadio', [
                'label'      => trans('plugins/blog::posts.form.format_type'),
                'label_attr' => ['class' => 'control-label'],
                'choices'    => get_post_formats(true),
            ]);
        }
    }
}
