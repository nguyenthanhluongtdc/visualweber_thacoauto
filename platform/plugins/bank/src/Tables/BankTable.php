<?php

namespace Platform\Bank\Tables;

use Auth;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Bank\Repositories\Interfaces\BankInterface;
use Platform\Table\Abstracts\TableAbstract;
use Illuminate\Contracts\Routing\UrlGenerator;
use Yajra\DataTables\DataTables;
use Platform\Bank\Models\Bank;

class BankTable extends TableAbstract
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
     * BankTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlGenerator
     * @param BankInterface $bankRepository
     */
    public function __construct(DataTables $table, UrlGenerator $urlGenerator, BankInterface $bankRepository)
    {
        $this->repository = $bankRepository;
        $this->setOption('id', 'table-plugins-bank');
        parent::__construct($table, $urlGenerator);

        if (!Auth::user()->hasAnyPermission(['bank.edit', 'bank.destroy'])) {
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
            ->editColumn('name', function ($item) {
                if (!Auth::user()->hasPermission('bank.edit')) {
                    return $item->name;
                }
                return anchor_link(route('bank.edit', $item->id), $item->name);
            })
            ->editColumn('checkbox', function ($item) {
                return table_checkbox($item->id);
            })
            ->editColumn('created_at', function ($item) {
                return date_from_database($item->created_at, config('core.base.general.date_format.date'));
            })
            ->editColumn('status', function ($item) {
                return $item->status->toHtml();
            });

        return apply_filters(BASE_FILTER_GET_LIST_DATA, $data, $this->repository->getModel())
            ->addColumn('operations', function ($item) {
                return table_actions('bank.edit', 'bank.destroy', $item);
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * {@inheritDoc}
     */
    public function query()
    {
        $model = $this->repository->getModel();
        $query = $model->select([
            'banks.id',
            'banks.name',
            'banks.description',
            'banks.created_at',
            'banks.status',
        ]);

        return $this->applyScopes(apply_filters(BASE_FILTER_TABLE_QUERY, $query, $model));
    }

    /**
     * {@inheritDoc}
     */
    public function columns()
    {
        return [
            'id' => [
                'name'  => 'banks.id',
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'name' => [
                'name'  => 'banks.name',
                'title' => trans('core/base::tables.name'),
                'class' => 'text-left',
            ],'description' => [
                'name'  => 'bank.description',
                'title' => "Mô tả",
                'class' => 'text-left',
            ],
            'created_at' => [
                'name'  => 'banks.created_at',
                'title' => trans('core/base::tables.created_at'),
                'width' => '100px',
            ],
            'status' => [
                'name'  => 'banks.status',
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
        $buttons = $this->addCreateButton(route('bank.create'), 'bank.create');

        return apply_filters(BASE_FILTER_TABLE_BUTTONS, $buttons, Bank::class);
    }

    /**
     * {@inheritDoc}
     */
    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('bank.deletes'), 'bank.destroy', parent::bulkActions());
    }

    /**
     * {@inheritDoc}
     */
    public function getBulkChanges(): array
    {
        return [
            'banks.name' => [
                'title'    => trans('core/base::tables.name'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
            'banks.status' => [
                'title'    => trans('core/base::tables.status'),
                'type'     => 'select',
                'choices'  => BaseStatusEnum::labels(),
                'validate' => 'required|in:' . implode(',', BaseStatusEnum::values()),
            ],
            'banks.created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type'  => 'date',
            ],
        ];
    }
}
