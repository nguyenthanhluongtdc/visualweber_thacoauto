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
        $bytes = sprintf('%u', filesize('storage/'.$path));

    if ($bytes > 0)
    {
        $unit = intval(log($bytes, 1024));
        $units = array('B', 'KB', 'MB', 'GB');

        if (array_key_exists($unit, $units) === true)
        {
            return sprintf('%d %s', $bytes / pow(1024, $unit), $units[$unit]);
        }
    }

    return $bytes;
    }
}