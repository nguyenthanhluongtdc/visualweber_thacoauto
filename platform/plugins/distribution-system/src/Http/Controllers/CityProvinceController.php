<?php

namespace Platform\DistributionSystem\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\DistributionSystem\Http\Requests\CityProvinceRequest;
use Platform\DistributionSystem\Repositories\Interfaces\CityProvinceInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\DistributionSystem\Tables\CityProvinceTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\DistributionSystem\Forms\CityProvinceForm;
use Platform\Base\Forms\FormBuilder;

class CityProvinceController extends BaseController
{
    /**
     * @var CityProvinceInterface
     */
    protected $cityProvinceRepository;

    /**
     * @param CityProvinceInterface $cityProvinceRepository
     */
    public function __construct(CityProvinceInterface $cityProvinceRepository)
    {
        $this->cityProvinceRepository = $cityProvinceRepository;
    }

    /**
     * @param CityProvinceTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(CityProvinceTable $table)
    {
        page_title()->setTitle(trans('plugins/distribution-system::city-province.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/distribution-system::city-province.create'));

        return $formBuilder->create(CityProvinceForm::class)->renderForm();
    }

    /**
     * @param CityProvinceRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(CityProvinceRequest $request, BaseHttpResponse $response)
    {
        $cityProvince = $this->cityProvinceRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(CITY_PROVINCE_MODULE_SCREEN_NAME, $request, $cityProvince));

        return $response
            ->setPreviousUrl(route('city-province.index'))
            ->setNextUrl(route('city-province.edit', $cityProvince->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    /**
     * @param int $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function edit($id, FormBuilder $formBuilder, Request $request)
    {
        $cityProvince = $this->cityProvinceRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $cityProvince));

        page_title()->setTitle(trans('plugins/distribution-system::city-province.edit') . ' "' . $cityProvince->name . '"');

        return $formBuilder->create(CityProvinceForm::class, ['model' => $cityProvince])->renderForm();
    }

    /**
     * @param int $id
     * @param CityProvinceRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, CityProvinceRequest $request, BaseHttpResponse $response)
    {
        $cityProvince = $this->cityProvinceRepository->findOrFail($id);

        $cityProvince->fill($request->input());

        $cityProvince = $this->cityProvinceRepository->createOrUpdate($cityProvince);

        event(new UpdatedContentEvent(CITY_PROVINCE_MODULE_SCREEN_NAME, $request, $cityProvince));

        return $response
            ->setPreviousUrl(route('city-province.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param int $id
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function destroy(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $cityProvince = $this->cityProvinceRepository->findOrFail($id);

            $this->cityProvinceRepository->delete($cityProvince);

            event(new DeletedContentEvent(CITY_PROVINCE_MODULE_SCREEN_NAME, $request, $cityProvince));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function deletes(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $cityProvince = $this->cityProvinceRepository->findOrFail($id);
            $this->cityProvinceRepository->delete($cityProvince);
            event(new DeletedContentEvent(CITY_PROVINCE_MODULE_SCREEN_NAME, $request, $cityProvince));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
