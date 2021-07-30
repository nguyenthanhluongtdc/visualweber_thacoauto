<?php

namespace Platform\Province\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\Province\Http\Requests\ProvinceRequest;
use Platform\Province\Repositories\Interfaces\ProvinceInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\Province\Tables\ProvinceTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Province\Forms\ProvinceForm;
use Platform\Base\Forms\FormBuilder;

class ProvinceController extends BaseController
{
    /**
     * @var ProvinceInterface
     */
    protected $provinceRepository;

    /**
     * @param ProvinceInterface $provinceRepository
     */
    public function __construct(ProvinceInterface $provinceRepository)
    {
        $this->provinceRepository = $provinceRepository;
    }

    /**
     * @param ProvinceTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(ProvinceTable $table)
    {
        page_title()->setTitle(trans('plugins/province::province.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/province::province.create'));

        return $formBuilder->create(ProvinceForm::class)->renderForm();
    }

    /**
     * @param ProvinceRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(ProvinceRequest $request, BaseHttpResponse $response)
    {
        $province = $this->provinceRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(PROVINCE_MODULE_SCREEN_NAME, $request, $province));

        return $response
            ->setPreviousUrl(route('province.index'))
            ->setNextUrl(route('province.edit', $province->id))
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
        $province = $this->provinceRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $province));

        page_title()->setTitle(trans('plugins/province::province.edit') . ' "' . $province->name . '"');

        return $formBuilder->create(ProvinceForm::class, ['model' => $province])->renderForm();
    }

    /**
     * @param int $id
     * @param ProvinceRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, ProvinceRequest $request, BaseHttpResponse $response)
    {
        $province = $this->provinceRepository->findOrFail($id);

        $province->fill($request->input());

        $province = $this->provinceRepository->createOrUpdate($province);

        event(new UpdatedContentEvent(PROVINCE_MODULE_SCREEN_NAME, $request, $province));

        return $response
            ->setPreviousUrl(route('province.index'))
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
            $province = $this->provinceRepository->findOrFail($id);

            $this->provinceRepository->delete($province);

            event(new DeletedContentEvent(PROVINCE_MODULE_SCREEN_NAME, $request, $province));

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
            $province = $this->provinceRepository->findOrFail($id);
            $this->provinceRepository->delete($province);
            event(new DeletedContentEvent(PROVINCE_MODULE_SCREEN_NAME, $request, $province));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
