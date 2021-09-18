<?php

namespace Platform\Shareholder\Repositories\Eloquent;

use Platform\Base\Enums\BaseStatusEnum;
use Platform\Support\Repositories\Eloquent\RepositoriesAbstract;
use Platform\Shareholder\Repositories\Interfaces\ShareholderInterface;

class ShareholderRepository extends RepositoriesAbstract implements ShareholderInterface
{
    /**
     * {@inheritDoc}
     */
    public function getByCategoryId($categoryId, $paginate = 5){
        if (!is_array($categoryId)) {
            $categoryId = [$categoryId];
        }
        $data = $this->getModel()
        ->whereHas('categories', function ($q) use ($categoryId) {
            $q->whereIn('app__shareholder_category.id', $categoryId);
        })
        ->whereStatus(BaseStatusEnum::PUBLISHED)
        ->orderBy('is_featured', 'desc')
        ->orderBy('created_at', 'desc')
        ->orderBy('id', 'desc');
        return $this->applyBeforeExecuteQuery($data)->paginate($paginate);
    }
}
