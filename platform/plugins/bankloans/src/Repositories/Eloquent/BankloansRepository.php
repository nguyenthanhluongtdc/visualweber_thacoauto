<?php

namespace Platform\Bankloans\Repositories\Eloquent;

use Platform\Base\Enums\BaseStatusEnum;
use Platform\Support\Repositories\Eloquent\RepositoriesAbstract;
use Platform\Bankloans\Repositories\Interfaces\BankloansInterface;

class BankloansRepository extends RepositoriesAbstract implements BankloansInterface
{
    /**
     * {@inheritDoc}
     */
    public function getBankloansById($id)
    {
        $data = $this->model->where([
            'id'     => $id,
            'status' => BaseStatusEnum::PUBLISHED,
        ]);

        return $this->applyBeforeExecuteQuery($data, true)->first();
    }
}
