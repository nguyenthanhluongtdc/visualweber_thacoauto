<?php

namespace Platform\DistributionSystem\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\DistributionSystem\Http\Requests\ShowroomBrandRequest;
use Platform\DistributionSystem\Repositories\Interfaces\ShowroomBrandInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\DistributionSystem\Tables\ShowroomBrandTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\DistributionSystem\Forms\ShowroomBrandForm;
use Platform\Base\Forms\FormBuilder;

class ShowroomBrandController extends BaseController
{
    /**
     * @var ShowroomBrandInterface
     */
    protected $showroomBrandRepository;

    /**
     * @param ShowroomBrandInterface $showroomBrandRepository
     */
    public function __construct(ShowroomBrandInterface $showroomBrandRepository)
    {
        $this->showroomBrandRepository = $showroomBrandRepository;
    }

    /**
     * @param ShowroomBrandTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(ShowroomBrandTable $table)
    {
        page_title()->setTitle(trans('plugins/distribution-system::showroom-brand.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/distribution-system::showroom-brand.create'));

        return $formBuilder->create(ShowroomBrandForm::class)->renderForm();
    }

    /**
     * @param ShowroomBrandRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(ShowroomBrandRequest $request, BaseHttpResponse $response)
    {
        $showroomBrand = $this->showroomBrandRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(SHOWROOM_BRAND_MODULE_SCREEN_NAME, $request, $showroomBrand));

        return $response
            ->setPreviousUrl(route('showroom-brand.index'))
            ->setNextUrl(route('showroom-brand.edit', $showroomBrand->id))
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
        $showroomBrand = $this->showroomBrandRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $showroomBrand));

        page_title()->setTitle(trans('plugins/distribution-system::showroom-brand.edit') . ' "' . $showroomBrand->name . '"');

        return $formBuilder->create(ShowroomBrandForm::class, ['model' => $showroomBrand])->renderForm();
    }

    /**
     * @param int $id
     * @param ShowroomBrandRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, ShowroomBrandRequest $request, BaseHttpResponse $response)
    {
        $showroomBrand = $this->showroomBrandRepository->findOrFail($id);

        $showroomBrand->fill($request->input());

        $showroomBrand = $this->showroomBrandRepository->createOrUpdate($showroomBrand);

        event(new UpdatedContentEvent(SHOWROOM_BRAND_MODULE_SCREEN_NAME, $request, $showroomBrand));

        return $response
            ->setPreviousUrl(route('showroom-brand.index'))
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
            $showroomBrand = $this->showroomBrandRepository->findOrFail($id);

            $this->showroomBrandRepository->delete($showroomBrand);

            event(new DeletedContentEvent(SHOWROOM_BRAND_MODULE_SCREEN_NAME, $request, $showroomBrand));

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
            $showroomBrand = $this->showroomBrandRepository->findOrFail($id);
            $this->showroomBrandRepository->delete($showroomBrand);
            event(new DeletedContentEvent(SHOWROOM_BRAND_MODULE_SCREEN_NAME, $request, $showroomBrand));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
