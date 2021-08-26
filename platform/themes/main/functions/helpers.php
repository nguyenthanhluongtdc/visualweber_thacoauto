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
    function get_all_with_featured($limit, array $with = [])
    {
        return app(PostInterface::class)->getAllWithFeatured($limit, $with);
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
