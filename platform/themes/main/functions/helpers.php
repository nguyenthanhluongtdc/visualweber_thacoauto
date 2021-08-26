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
    function get_first_video_post()
    {
        return app(PostInterface::class)->getFirstVideoPost() ?? collect();
    }
}

if (!function_exists('get_current_url_with_lang')) {
    function get_current_url_with_lang()
    {
        $url = URL::current();
        // $lang = Language::÷
    }
}
