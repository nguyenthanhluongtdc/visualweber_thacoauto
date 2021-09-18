<?php

namespace Platform\Shareholdercateogry\Repositories\Eloquent;

use Platform\Base\Enums\BaseStatusEnum;
use Platform\Support\Repositories\Eloquent\RepositoriesAbstract;
use Platform\Shareholdercateogry\Repositories\Interfaces\ShareholdercateogryInterface;

class ShareholdercateogryRepository extends RepositoriesAbstract implements ShareholdercateogryInterface
{
    public function getAllCategories(array $condition = [], array $with = [])
    {
        $data = $this->model->with('slugable');
        if (!empty($condition)) {
            $data = $data->where($condition);
        }

        $data = $data
            ->where('status', BaseStatusEnum::PUBLISHED)
            ->orderBy('created_at', 'DESC')
            ->orderBy('order', 'DESC');

        if ($with) {
            $data = $data->with($with);
        }

        return $this->applyBeforeExecuteQuery($data)->get();
    }
}
