<?php

namespace Platform\Gallery\Repositories\Eloquent;

use Platform\Base\Enums\BaseStatusEnum;
use Platform\Support\Repositories\Eloquent\RepositoriesAbstract;
use Platform\Gallery\Repositories\Interfaces\GalleryInterface;

class GalleryRepository extends RepositoriesAbstract implements GalleryInterface
{

    /**
     * {@inheritDoc}
     */
    public function getAll(array $with = ['slugable', 'user'])
    {
        $data = $this->model
            ->with($with)
            ->where('status', BaseStatusEnum::PUBLISHED)
            ->orderBy('order')
            ->orderBy('created_at', 'desc');

        return $this->applyBeforeExecuteQuery($data)->get();
    }

    /**
     * {@inheritDoc}
     */
    public function getDataSiteMap()
    {
        $data = $this->model
            ->with('slugable')
            ->where('status', BaseStatusEnum::PUBLISHED)
            ->orderBy('order')
            ->orderBy('created_at', 'desc');

        return $this->applyBeforeExecuteQuery($data)->get();
    }

    /**
     * {@inheritDoc}
     */
    public function getFeaturedGalleries($limit, array $with = ['slugable', 'user'])
    {
        $data = $this->model
            ->with($with)
            ->where([
                'status'   => BaseStatusEnum::PUBLISHED,
                'is_featured' => 1,
            ])
            ->select([
                'id',
                'name',
                'user_id',
                'image',
                'created_at',
            ])
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->limit($limit);

        return $this->applyBeforeExecuteQuery($data)->get();
    }
}
