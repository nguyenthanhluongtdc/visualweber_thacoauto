<?php

namespace Platform\DistributionSystem\Tables;

use Illuminate\Support\Facades\Auth;
use BaseHelper;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\DistributionSystem\Repositories\Interfaces\ShowroomBrandInterface;
use Platform\Table\Abstracts\TableAbstract;
use Illuminate\Contracts\Routing\UrlGenerator;
use Yajra\DataTables\DataTables;
use Html;

class ShowroomBrandTable extends TableAbstract
{

    /**
     * @var bool
     */
    protected $hasActions = true;

    /**
     * @var bool
     */
    protected $hasFilter = true;

    /**
     * ShowroomBrandTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlGenerator
     * @param ShowroomBrandInterface $showroomBrandRepository
     */
    public function __construct(DataTables $table, UrlGenerator $urlGenerator, ShowroomBrandInterface $showroomBrandRepository)
    {
        parent::__construct($table, $urlGenerator);

        $this->repository = $showroomBrandRepository;

        if (!Auth::user()->hasAnyPermission(['showroom-brand.edit', 'showroom-brand.destroy'])) {
            $this->hasOperations = false;
            $this->hasActions = false;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function ajax()
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('checkbox', function ($item) {
                return $this->getCheckbox($item->id);
            })
            ->editColumn('showroom_id', function ($item) {
                return $item->showroom->name ?? "--";
            })
            ->editColumn('brand_id', function ($item) {
                return $item->brand->name ?? "--";
            })
            ->editColumn('category_id', function ($item) {
                return $item->category->name ?? "--";
            })
            ->editColumn('created_at', function ($item) {
                return BaseHelper::formatDate($item->created_at);
            })
            ->editColumn('status', function ($item) {
                return $item->status->toHtml();
            })
            ->addColumn('operations', function ($item) {
                return $this->getOperations('showroom-brand.edit', 'showroom-brand.destroy', $item);
            });

        return $this->toJson($data);
    }

    /**
     * {@inheritDoc}
     */
    public function query()
    {
        $query = $this->repository->getModel()
            ->select([
               'id',
               'brand_id',
               'showroom_id',
               'category_id',
               'created_at',
               'status',
           ]);

        return $this->applyScopes($query);
    }

    /**
     * {@inheritDoc}
     */
    public function columns()
    {
        return [
            'id' => [
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'showroom_id' => [
                'title' => trans('Đại lý'),
                'class' => 'text-left',
            ],
            'brand_id' => [
                'title' => trans('Thương hiệu'),
                'class' => 'text-left',
            ],
            'category_id' => [
                'title' => trans('Loại xe'),
                'class' => 'text-left',
            ],
            'created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'width' => '100px',
            ],
            'status' => [
                'title' => trans('core/base::tables.status'),
                'width' => '100px',
            ],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function buttons()
    {
        return $this->addCreateButton(route('showroom-brand.create'), 'showroom-brand.create');
    }

    /**
     * {@inheritDoc}
     */
    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('showroom-brand.deletes'), 'showroom-brand.destroy', parent::bulkActions());
    }

    /**
     * {@inheritDoc}
     */
    public function getBulkChanges(): array
    {
        return [
            'status' => [
                'title'    => trans('core/base::tables.status'),
                'type'     => 'select',
                'choices'  => BaseStatusEnum::labels(),
                'validate' => 'required|in:' . implode(',', BaseStatusEnum::values()),
            ],
            'created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type'  => 'date',
            ],
        ];
    }

    /**
     * @return array
     */
    public function getFilters(): array
    {
        return $this->getBulkChanges();
    }
}
