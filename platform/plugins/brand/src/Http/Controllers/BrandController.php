<?php

namespace Platform\Brand\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\Brand\Http\Requests\BrandRequest;
use Platform\Brand\Repositories\Interfaces\BrandInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\Brand\Tables\BrandTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Brand\Forms\BrandForm;
use Platform\Base\Forms\FormBuilder;

class BrandController extends BaseController
{
    /**
     * @var BrandInterface
     */
    protected $brandRepository;

    /**
     * @param BrandInterface $brandRepository
     */
    public function __construct(BrandInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    /**
     * @param BrandTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(BrandTable $table)
    {
        page_title()->setTitle(trans('plugins/brand::brand.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/brand::brand.create'));

        return $formBuilder->create(BrandForm::class)->renderForm();
    }

    /**
     * @param BrandRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(BrandRequest $request, BaseHttpResponse $response)
    {
        $brand = $this->brandRepository->createOrUpdate($request->input());

        // store categories
        $categories = $request->input('categories');
        if (!empty($categories) && is_array($categories)) {
            $brand->categories()->sync($categories);
        }

        event(new CreatedContentEvent(BRAND_MODULE_SCREEN_NAME, $request, $brand));

        return $response
            ->setPreviousUrl(route('brand.index'))
            ->setNextUrl(route('brand.edit', $brand->id))
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
        $brand = $this->brandRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $brand));

        page_title()->setTitle(trans('plugins/brand::brand.edit') . ' "' . $brand->name . '"');

        return $formBuilder->create(BrandForm::class, ['model' => $brand])->renderForm();
    }

    /**
     * @param int $id
     * @param BrandRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, BrandRequest $request, BaseHttpResponse $response)
    {
        $brand = $this->brandRepository->findOrFail($id);

        $brand->fill($request->input());

        $brand = $this->brandRepository->createOrUpdate($brand);

        // store categories
        $categories = $request->input('categories');
        if (!empty($categories) && is_array($categories)) {
            $brand->categories()->sync($categories);
        }
        
        event(new UpdatedContentEvent(BRAND_MODULE_SCREEN_NAME, $request, $brand));

        return $response
            ->setPreviousUrl(route('brand.index'))
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
            $brand = $this->brandRepository->findOrFail($id);

            $this->brandRepository->delete($brand);

            event(new DeletedContentEvent(BRAND_MODULE_SCREEN_NAME, $request, $brand));

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
            $brand = $this->brandRepository->findOrFail($id);
            $this->brandRepository->delete($brand);
            event(new DeletedContentEvent(BRAND_MODULE_SCREEN_NAME, $request, $brand));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
