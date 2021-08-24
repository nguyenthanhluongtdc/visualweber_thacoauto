<?php

namespace Platform\Location\Tables;

use Illuminate\Support\Facades\Auth;
use BaseHelper;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Location\Repositories\Interfaces\CityInterface;
use Platform\Location\Repositories\Interfaces\CountryInterface;
use Platform\Location\Repositories\Interfaces\StateInterface;
use Platform\Table\Abstracts\TableAbstract;
use Html;
use Illuminate\Contracts\Routing\UrlGenerator;
use Yajra\DataTables\DataTables;

class CityTable extends TableAbstract
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
     * @var CountryInterface
     */
    protected $countryRepository;

    /**
     * @var StateInterface
     */
    protected $stateRepository;

    /**
     * CityTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlGenerator
     * @param CityInterface $cityRepository
     * @param CountryInterface $countryRepository
     * @param StateInterface $stateRepository
     */
    public function __construct(
        DataTables $table,
        UrlGenerator $urlGenerator,
        CityInterface $cityRepository,
        CountryInterface $countryRepository,
        StateInterface $stateRepository
    ) {
        parent::__construct($table, $urlGenerator);

        $this->repository = $cityRepository;
        $this->countryRepository = $countryRepository;
        $this->stateRepository = $stateRepository;

        if (!Auth::user()->hasAnyPermission(['city.edit', 'city.destroy'])) {
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
                if (!Auth::user()->hasPermission('city.edit')) {
                    return $item->name;
                }
                return Html::link(route('city.edit', $item->id), $item->name);
            })
            ->editColumn('state_id', function ($item) {
                if (!$item->state_id && $item->state->name) {
                    return null;
                }
                return Html::link(route('state.edit', $item->state_id), $item->state->name);
            })
            ->editColumn('country_id', function ($item) {
                if (!$item->country_id && $item->country->name) {
                    return null;
                }
                return Html::link(route('country.edit', $item->country_id), $item->country->name);
            })
            ->editColumn('checkbox', function ($item) {
                return $this->getCheckbox($item->id);
            })
            ->editColumn('created_at', function ($item) {
                return BaseHelper::formatDate($item->created_at);
            })
            ->editColumn('status', function ($item) {
                return $item->status->toHtml();
            })
            ->addColumn('operations', function ($item) {
                return $this->getOperations('city.edit', 'city.destroy', $item);
            });

        return $this->toJson($data);
    }

    /**
     * {@inheritDoc}
     */
    public function query()
    {
        $query = $this->repository->getModel()->select([
            'id',
            'name',
            'state_id',
            'country_id',
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
            'id'         => [
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'name'       => [
                'title' => trans('core/base::tables.name'),
                'class' => 'text-left',
            ],
            'state_id'   => [
                'title' => trans('plugins/location::city.state'),
                'class' => 'text-left',
            ],
            'country_id' => [
                'title' => trans('plugins/location::city.country'),
                'class' => 'text-left',
            ],
            'created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'width' => '100px',
            ],
            'status'     => [
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
        return $this->addCreateButton(route('city.create'), 'city.create');
    }

    /**
     * {@inheritDoc}
     */
    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('city.deletes'), 'city.destroy', parent::bulkActions());
    }

    /**
     * {@inheritDoc}
     */
    public function getBulkChanges(): array
    {
        return [
            'name'       => [
                'title'    => trans('core/base::tables.name'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
            'state_id'   => [
                'title'    => trans('plugins/location::city.state'),
                'type'     => 'select',
                'validate' => 'required|max:120',
            ],
            'country_id' => [
                'title'    => trans('plugins/location::city.country'),
                'type'     => 'select',
                'validate' => 'required|max:120',
            ],
            'status'     => [
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
}