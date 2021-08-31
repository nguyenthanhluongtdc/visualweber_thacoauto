<?php

namespace Platform\Bankloans\Tables;

use Auth;
use Platform\AskType\Models\AskType;
use Platform\Bank\Models\Bank;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Bankloans\Repositories\Interfaces\BankloansInterface;
use Platform\Table\Abstracts\TableAbstract;
use Illuminate\Contracts\Routing\UrlGenerator;
use Yajra\DataTables\DataTables;
use Platform\Bankloans\Models\Bankloans;

class BankloansTable extends TableAbstract
{

    /**
     * @var bool
     */
    protected $hasActions = false;

    /**
     * @var bool
     */
    protected $hasFilter = true;

    /**
     * BankloansTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlGenerator
     * @param BankloansInterface $bankloansRepository
     */
    public function __construct(DataTables $table, UrlGenerator $urlGenerator, BankloansInterface $bankloansRepository)
    {
        $this->repository = $bankloansRepository;
        $this->setOption('id', 'table-plugins-bankloans');
        parent::__construct($table, $urlGenerator);

        if (!Auth::user()->hasAnyPermission(['bankloans.edit', 'bankloans.destroy'])) {
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
                if (!Auth::user()->hasPermission('bankloans.edit')) {
                    return $item->name;
                }
                return anchor_link(route('bankloans.edit', $item->id), $item->name);
            })
            ->editColumn('checkbox', function ($item) {
                return table_checkbox($item->id);
            })
            ->editColumn('bank_id', function ($item) {
                $parent_name = Bank::where('id',$item->bank_id)->first() ? Bank::where('id',$item->bank_id)->first()->name : $item->bank_id;
                return  $parent_name;
            })
            ->editColumn('created_at', function ($item) {
                return date_from_database($item->created_at, config('core.base.general.date_format.date'));
            })
            ->editColumn('status', function ($item) {
                return $item->status->toHtml();
            });

        return apply_filters(BASE_FILTER_GET_LIST_DATA, $data, $this->repository->getModel())
            ->addColumn('operations', function ($item) {
                return table_actions('bankloans.edit', 'bankloans.destroy', $item);
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
            'bankloans.id',
            'bankloans.name',
            'bankloans.description',
            'bankloans.months',
            'bankloans.interest_rate',
            'bankloans.floating_rate',
            'bankloans.percent_loans',
            'bankloans.bank_id',
            'bankloans.created_at',
            'bankloans.status',
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
                'name'  => 'bankloans.id',
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'name' => [
                'name'  => 'bankloans.name',
                'title' => trans('core/base::tables.name'),
                'class' => 'text-left',
            ]
            ,'bank_id' => [
                'name'  => 'bankloans.bank_id',
                'title' => 'Tên ngân hàng',
                'class' => 'text-left',
            ],'percent_loans' => [
                'name'  => 'bankloans.interest_rate',
                'title' => '(%) cho phép vay/ 1 sản phẩm',
                'class' => 'text-left',
            ],'months' => [
                'name'  => 'bankloans.months',
                'title' => 'Tháng vay',
                'class' => 'text-left',
            ],'interest_rate' => [
                'name'  => 'bankloans.interest_rate',
                'title' => 'Lãi xuất(%)',
                'class' => 'text-left',
            ],'floating_rate' => [
                'name'  => 'bankloans.floating_rate',
                'title' => 'Lãi xuất thả nổi(%)',
                'class' => 'text-left',
            ],
            'created_at' => [
                'name'  => 'bankloans.created_at',
                'title' => trans('core/base::tables.created_at'),
                'width' => '100px',
            ],
            'status' => [
                'name'  => 'bankloans.status',
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
        $buttons = $this->addCreateButton(route('bankloans.create'), 'bankloans.create');

        return apply_filters(BASE_FILTER_TABLE_BUTTONS, $buttons, Bankloans::class);
    }

    /**
     * {@inheritDoc}
     */
    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('bankloans.deletes'), 'bankloans.destroy', parent::bulkActions());
    }

    /**
     * {@inheritDoc}
     */
    public function getBulkChanges(): array
    {
        $categories = Bank::whereStatus(BaseStatusEnum::PUBLISHED)
            ->get()
            ->pluck('name', 'id')
            ->toArray();
        return [
            'months' => [
                'name'  => 'bankloans.months',
                'title' => 'Thời gian cho vay(Tháng)',
                'type'     => 'number',
                'validate' => 'required|max:120',
            ],'percent_loans' => [
                'name'  => 'bankloans.percent_loans',
                'title' => 'Phần trăm được phép vay',
                'type'     => 'number',
                'validate' => 'required|max:120',
            ]
            ,'interest_rate' => [
                'name'  => 'bankloans.interest_rate',
                'title' => 'Lãi suất cho vay',
                'type'     => 'number',
                'validate' => 'required|max:120',
            ]
            ,'bank_id' => [
                'name'  => 'bankloans.bank_id',
                'title' => 'Tên ngân hàng',
                'type'     => 'select',
                'choices'  => [

                ]+$categories

            ],
            'bankloans.status' => [
                'title'    => 'Trạng thái',
                'type'     => 'select',
                'choices'  => BaseStatusEnum::labels(),
                'validate' => 'required|in:' . implode(',', BaseStatusEnum::values()),
            ],
            'bankloans.created_at' => [
                'title' => 'Ngày thêm vào',
                'type'  => 'date',
            ],
        ];
    }
}
