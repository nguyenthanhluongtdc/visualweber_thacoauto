<?php

use Platform\Blog\Repositories\Interfaces\PostInterface as InterfacesPostInterface;
use Platform\Kernel\Repositories\Interfaces\PostInterface;

if (!function_exists('get_featured_posts_by_category')) {
    /**
     * @param array $categoryId
     * @param int $limit
     * @param array $with
     * @return \Illuminate\Support\Collection
     */
    function get_featured_posts_by_category($categoryId, $limit, array $with = [])
    {
        return app(PostInterface::class)->getFeaturedByCategory($categoryId, $limit, $with);
    }
}

if (!function_exists('get_all_with_featured')) {
    /**
     * @param int $limit
     * @param array $with
     * @return \Illuminate\Support\Collection
     */
    function get_all_with_featured($limit, $except = [], array $with = [])
    {
        return app(PostInterface::class)->getAllWithFeatured($limit, $except, $with);
    }
}

if (!function_exists('get_only_featured_posts_by_category')) {
    /**
     * @param array $categoryId
     * @param int $limit
     * @param array $with
     * @return \Illuminate\Support\Collection
     */
    function get_only_featured_posts_by_category($categoryId, $limit, array $with = [])
    {
        return app(PostInterface::class)->getOnlyFeaturedByCategory($categoryId, $limit, $with);
    }
}
if (!function_exists('get_featured_posts_by_category_with_province_id')) {
    /**
     * @param array $categoryId
     * @param int $limit
     * @param array $with
     * @return \Illuminate\Support\Collection
     */
    function get_featured_posts_by_category_with_province_id($categoryId, $provinceId, $paginate, array $with = [])
    {
        return app(PostInterface::class)->getFeaturedByCategoryWithProvinceId($categoryId, $provinceId, $paginate, $with);
    }
}

if (!function_exists('get_file_name')) {
    function get_file_name($reference)
    {
        $file = new SplFileInfo($reference);

        return $file->getFilename();
    }
}

if (!function_exists('get_file_size')) {
    function get_file_size($path)
    {
        $bytes = sprintf('%u', filesize('storage/' . $path));

        if ($bytes > 0) {
            $unit = intval(log($bytes, 1024));
            $units = array('B', 'KB', 'MB', 'GB');

            if (array_key_exists($unit, $units) === true) {
                return sprintf('%d %s', $bytes / pow(1024, $unit), $units[$unit]);
            }
        }

        return $bytes;
    }
}

if (!function_exists('render_media_gallery')) {
    /**
     * render media gallery function
     *
     * @param [type] $post
     * @return void
     */
    function render_media_gallery($post)
    {
        return \Theme::scope('gallery-detail', ['post' => $post])->render();
    }
}

if (!function_exists('get_first_video_post')) {
    /**
     * Get first video post function
     *
     * @return void
     */
    function get_first_video_post()
    {
        return app(PostInterface::class)->getFirstVideoPost() ?? collect();
    }
}

if (!function_exists('get_comment_count')) {
    /**
     * Get comment count function
     *
     * @param [type] $reference
     * @return void
     */
    function get_comment_count($reference)
    {
        if(is_plugin_active('comment')) {
            $count = app(Platform\Comment\Repositories\Interfaces\CommentInterface::class)
                ->advancedGet([
                    'condition' => [
                        'reference_type' => get_class($reference),
                        'reference_id' => $reference->id
                    ],
                    'select' => ['id']
                ])->count() ?? 0;

            return $count;
        }
        return 0;
    }
}

if (!function_exists('get_result_language_file')) {
    function get_result_language_file()
    {
        $group['locale'] = \Language::getCurrentLocale();

        $translations = [];
        if ($group) {
            $jsonFile = resource_path('lang/' . $group['locale'] . '.json');

            if (!File::exists($jsonFile)) {
                $jsonFile = theme_path(\Theme::getThemeName() . '/lang/' . $group['locale'] . '.json');
            }

            if (!File::exists($jsonFile)) {
                $languages = scan_folder(theme_path(\Theme::getThemeName() . '/lang'));

                if (!empty($languages)) {
                    $jsonFile = theme_path(\Theme::getThemeName() . '/lang/' . Arr::first($languages));
                }
            }

            if (File::exists($jsonFile)) {
                $translations = get_file_data($jsonFile, true);
            }

            if ($group['locale'] != 'en') {
                $defaultEnglishFile = theme_path(\Theme::getThemeName() . '/lang/en.json');

                if ($defaultEnglishFile) {
                    $translations = array_merge(get_file_data($defaultEnglishFile, true), $translations);
                }
            }
        }

        return $translations;
    }
}

if (!function_exists('get_discount_price')) {
    function get_discount_price($discount, $originPrice = 0)
    {
        $priceDiscount = $originPrice * $discount->discount_percent / 100;
        
        if($discount->direct_discount == 0){
            if($discount->max_discount == 0){
                return $priceDiscount;
            }
            else{
                if($priceDiscount >= $discount->max_discount){
                    return $discount->max_discount;
                }
                else{
                    return $priceDiscount;
                }
            }
        }
        else{
            return $discount->direct_discount;
        }
    }
}