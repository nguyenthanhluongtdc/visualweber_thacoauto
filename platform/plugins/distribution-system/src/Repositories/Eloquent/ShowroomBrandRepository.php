<?php

namespace Platform\DistributionSystem\Repositories\Eloquent;

use Platform\Support\Repositories\Eloquent\RepositoriesAbstract;
use Platform\DistributionSystem\Repositories\Interfaces\ShowroomBrandInterface;

class ShowroomBrandRepository extends RepositoriesAbstract implements ShowroomBrandInterface
{
    public function getBrandGroupByCategory($ids)
    {
        $data = $this->getModel()
            ->whereHas('showroom', function($q) use($ids) {
                $q->whereIn('app_showrooms.id', $ids);
            })
            ->with('category', 'brand');

        return $this->applyBeforeExecuteQuery($data)
            ->get();
    }
}
