<?php

namespace Platform\Province\Repositories\Eloquent;

use Platform\Support\Repositories\Eloquent\RepositoriesAbstract;
use Platform\Province\Repositories\Interfaces\ProvinceInterface;
use Platform\Base\Enums\BaseStatusEnum;

class ProvinceRepository extends RepositoriesAbstract implements ProvinceInterface
{
    public function getAllProvince($active = true)
    {
        $data = $this->model->select('app_provinces.*');
        
        if ($active) {
            $data = $data->where('app_provinces.status', BaseStatusEnum::PUBLISHED);
        }

        return $this->applyBeforeExecuteQuery($data)->get();
    }
}
