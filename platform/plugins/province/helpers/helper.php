<?php
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Province\Repositories\Interfaces\ProvinceInterface;
if (!function_exists('get_all_provinces')) {
    /**
     * @return \Illuminate\Support\Collection
     * @throws Exception
     */
    function get_all_provinces()
    {
        $provinces = app(ProvinceInterface::class)
            ->getAllProvince(['status' => BaseStatusEnum::PUBLISHED]);

        return $provinces;
    }
}
