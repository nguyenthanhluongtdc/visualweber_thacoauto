<?php

namespace Platform\Promotions\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\Promotions\Http\Requests\PromotionsRequest;
use Platform\Promotions\Repositories\Interfaces\PromotionsInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\Promotions\Tables\PromotionsTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Promotions\Forms\PromotionsForm;
use Platform\Base\Forms\FormBuilder;
use Illuminate\Support\Facades\Auth;

class PromotionsController extends BaseController
{
    /**
     * @var PromotionsInterface
     */
    protected $promotionsRepository;

    /**
     * @param PromotionsInterface $promotionsRepository
     */
    public function __construct(PromotionsInterface $promotionsRepository)
    {
        $this->promotionsRepository = $promotionsRepository;
    }

    /**
     * @param PromotionsTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(PromotionsTable $table)
    {
        page_title()->setTitle(trans('plugins/promotions::promotions.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/promotions::promotions.create'));

        return $formBuilder->create(PromotionsForm::class)->renderForm();
    }

    /**
     * @param PromotionsRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(PromotionsRequest $request, BaseHttpResponse $response)
    {
        $promotions = $this->promotionsRepository->createOrUpdate(array_merge($request->input(), [
            'author_id'   => Auth::id(),
            'author_type' => \Platform\ACL\Models\User::class,
        ]));

        event(new CreatedContentEvent(PROMOTIONS_MODULE_SCREEN_NAME, $request, $promotions));

        $promotions->cars()->sync(request('cars', []));

        return $response
            ->setPreviousUrl(route('promotions.index'))
            ->setNextUrl(route('promotions.edit', $promotions->id))
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
        $promotions = $this->promotionsRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $promotions));

        page_title()->setTitle(trans('plugins/promotions::promotions.edit') . ' "' . $promotions->name . '"');


        return $formBuilder->create(PromotionsForm::class, ['model' => $promotions])->renderForm();
    }

    /**
     * @param int $id
     * @param PromotionsRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, PromotionsRequest $request, BaseHttpResponse $response)
    {
        $promotions = $this->promotionsRepository->findOrFail($id);

        $promotions->fill($request->input());

        $promotions = $this->promotionsRepository->createOrUpdate($promotions);

        event(new UpdatedContentEvent(PROMOTIONS_MODULE_SCREEN_NAME, $request, $promotions));

        $promotions->cars()->sync(request('cars', []));

        return $response
            ->setPreviousUrl(route('promotions.index'))
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
            $promotions = $this->promotionsRepository->findOrFail($id);

            $this->promotionsRepository->delete($promotions);

            event(new DeletedContentEvent(PROMOTIONS_MODULE_SCREEN_NAME, $request, $promotions));

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
            $promotions = $this->promotionsRepository->findOrFail($id);
            $this->promotionsRepository->delete($promotions);
            event(new DeletedContentEvent(PROMOTIONS_MODULE_SCREEN_NAME, $request, $promotions));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
