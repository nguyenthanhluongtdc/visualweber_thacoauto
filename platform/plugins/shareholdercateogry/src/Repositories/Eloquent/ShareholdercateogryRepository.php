<?php

namespace Platform\Shareholdercateogry\Repositories\Eloquent;

use Platform\Base\Enums\BaseStatusEnum;
use Platform\Support\Repositories\Eloquent\RepositoriesAbstract;
use Platform\Shareholdercateogry\Repositories\Interfaces\ShareholdercateogryInterface;

class ShareholdercateogryRepository extends RepositoriesAbstract implements ShareholdercateogryInterface
{
    public function getAllCategories()
    {
        $data = $this->model->with('slugable');

        $data = $data
            ->where('status', BaseStatusEnum::PUBLISHED)
            ->orderBy('created_at', 'DESC')
            ->orderBy('order', 'DESC');



        return $this->applyBeforeExecuteQuery($data)->get();
    }
}
