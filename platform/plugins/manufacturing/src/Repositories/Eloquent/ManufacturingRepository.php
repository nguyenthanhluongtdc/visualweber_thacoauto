<?php

namespace Platform\Manufacturing\Repositories\Eloquent;

use Platform\Support\Repositories\Eloquent\RepositoriesAbstract;
use Platform\Manufacturing\Repositories\Interfaces\ManufacturingInterface;
use Platform\Base\Enums\BaseStatusEnum;

class ManufacturingRepository extends RepositoriesAbstract implements ManufacturingInterface
{
    public function getManufacturingById($id)
    {
        $data = $this->model->with('slugable')->where([
            'id'     => $id,
            'status' => BaseStatusEnum::PUBLISHED,
        ]);

        return $this->applyBeforeExecuteQuery($data, true)->first();
    }
}
