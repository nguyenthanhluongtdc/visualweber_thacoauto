<?php

namespace Platform\Base\Helpers;

use Carbon\Carbon;
use Illuminate\Database\Query\Builder;

class BaseHelper
{
    /**
     * @param Carbon $timestamp
     * @param string $format
     * @return string
     */
    public function formatTime(Carbon $timestamp, string $format = 'j M Y H:i')
    {
        return format_time($timestamp, $format);
    }

    /**
     * @param string $date
     * @param string $format
     * @return string
     */
    public function formatDate(?string $date, string $format = null)
    {
        if (empty($format)) {
            $format = config('core.base.general.date_format.date');
        }

        return date_from_database($date, $format);
    }

    /**
     * @param int $bytes
     * @param int $precision
     * @return string
     */
    public function humanFilesize(int $bytes, int $precision = 2)
    {
        return human_file_size($bytes, $precision);
    }

    /**
     * @param string $file
     * @param bool $convertToArray
     * @return array|bool|mixed|null
     */
    public function getFileData(string $file, bool $convertToArray = true)
    {
        return get_file_data($file, $convertToArray);
    }

    /**
     * @param string $path
     * @param string $data
     * @param bool $json
     * @return bool|mixed
     */
    public function saveFileData(string $path, string $data, bool $json)
    {
        return save_file_data($path, $data, $json);
    }

    /**
     * @param array $data
     * @return string
     */
    public function jsonEncodePrettify(array $data)
    {
        return json_encode_prettify($data);
    }

    /**
     * @param string $path
     * @param array $ignoreFiles
     * @return array
     */
    public function scanFolder(string $path, array $ignoreFiles = [])
    {
        return scan_folder($path, $ignoreFiles);
    }

    /**
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    public function getAdminPrefix(): string
    {
        return config('core.base.general.admin_dir');
    }

    /**
     * @return string
     */
    public function siteLanguageDirection()
    {
        return apply_filters(BASE_FILTER_SITE_LANGUAGE_DIRECTION, setting('locale_direction', 'ltr'));
    }

    /**
     * @return string
     */
    public function adminLanguageDirection()
    {
        $direction = session('admin_locale_direction', setting('admin_locale_direction', 'ltr'));

        return apply_filters(BASE_FILTER_SITE_LANGUAGE_DIRECTION, $direction);
    }

    /**
     * @return mixed
     */
    public function getHomepageId()
    {
        return theme_option('homepage_id', setting('show_on_front'));
    }

    /**
     * @param int $pageId
     * @return bool
     */
    public function isHomepage($pageId = null)
    {
        $homepageId = $this->getHomepageId();

        return $pageId && $homepageId && $pageId == $homepageId;
    }

    /**
     * @param Builder $query
     * @param string $table
     * @return bool
     */
    public function isJoined($query, $table): bool
    {
        $joins = $query->getQuery()->joins;

        if ($joins == null) {
            return false;
        }

        foreach ($joins as $join) {
            if ($join->table == $table) {
                return true;
            }
        }

        return false;
    }
}
