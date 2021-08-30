<?php

namespace Platform\CarCategory\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\CarCategory\Http\Requests\CarCategoryRequest;
use Platform\CarCategory\Repositories\Interfaces\CarCategoryInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Platform\CarCategory\Tables\CarCategoryTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\CarCategory\Forms\CarCategoryForm;
use Platform\Base\Forms\FormBuilder;

class CarCategoryController extends BaseController
{
    /**
     * @var CarCategoryInterface
     */
    protected $carCategoryRepository;

    /**
     * @param CarCategoryInterface $carCategoryRepository
     */
    public function __construct(CarCategoryInterface $carCategoryRepository)
    {
        $this->carCategoryRepository = $carCategoryRepository;
    }

    /**
     * @param CarCategoryTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(CarCategoryTable $table)
    {
        page_title()->setTitle(trans('plugins/car-category::car-category.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/car-category::car-category.create'));

        return $formBuilder->create(CarCategoryForm::class)->renderForm();
    }

    /**
     * @param CarCategoryRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(CarCategoryRequest $request, BaseHttpResponse $response)
    {
        $request->merge([
            'author_id'   => Auth::id(),
            'author_type' => User::class,
        ]);

        $carCategory = $this->carCategoryRepository->createOrUpdate($request->all());

        event(new CreatedContentEvent(CAR_CATEGORY_MODULE_SCREEN_NAME, $request, $carCategory));

        return $response
            ->setPreviousUrl(route('car-category.index'))
            ->setNextUrl(route('car-category.edit', $carCategory->id))
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
        $carCategory = $this->carCategoryRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $carCategory));

        page_title()->setTitle(trans('plugins/car-category::car-category.edit') . ' "' . $carCategory->name . '"');

        return $formBuilder->create(CarCategoryForm::class, ['model' => $carCategory])->renderForm();
    }

    /**
     * @param int $id
     * @param CarCategoryRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, CarCategoryRequest $request, BaseHttpResponse $response)
    {
        $carCategory = $this->carCategoryRepository->findOrFail($id);

        $carCategory->fill($request->input());

        $carCategory = $this->carCategoryRepository->createOrUpdate($carCategory);

        event(new UpdatedContentEvent(CAR_CATEGORY_MODULE_SCREEN_NAME, $request, $carCategory));

        return $response
            ->setPreviousUrl(route('car-category.index'))
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
            $carCategory = $this->carCategoryRepository->findOrFail($id);

            $this->carCategoryRepository->delete($carCategory);

            event(new DeletedContentEvent(CAR_CATEGORY_MODULE_SCREEN_NAME, $request, $carCategory));

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
            $carCategory = $this->carCategoryRepository->findOrFail($id);
            $this->carCategoryRepository->delete($carCategory);
            event(new DeletedContentEvent(CAR_CATEGORY_MODULE_SCREEN_NAME, $request, $carCategory));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
