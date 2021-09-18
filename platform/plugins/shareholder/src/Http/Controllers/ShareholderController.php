<?php

namespace Platform\Shareholder\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\Shareholder\Http\Requests\ShareholderRequest;
use Platform\Shareholder\Repositories\Interfaces\ShareholderInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\Shareholder\Tables\ShareholderTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Shareholder\Forms\ShareholderForm;
use Platform\Base\Forms\FormBuilder;

class ShareholderController extends BaseController
{
    /**
     * @var ShareholderInterface
     */
    protected $shareholderRepository;

    /**
     * @param ShareholderInterface $shareholderRepository
     */
    public function __construct(ShareholderInterface $shareholderRepository)
    {
        $this->shareholderRepository = $shareholderRepository;
    }

    /**
     * @param ShareholderTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(ShareholderTable $table)
    {
        page_title()->setTitle(trans('plugins/shareholder::shareholder.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/shareholder::shareholder.create'));

        return $formBuilder->create(ShareholderForm::class)->renderForm();
    }

    /**
     * @param ShareholderRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(ShareholderRequest $request, BaseHttpResponse $response)
    {
        $shareholder = $this->shareholderRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(SHAREHOLDER_MODULE_SCREEN_NAME, $request, $shareholder));

        return $response
            ->setPreviousUrl(route('shareholder.index'))
            ->setNextUrl(route('shareholder.edit', $shareholder->id))
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
        $shareholder = $this->shareholderRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $shareholder));

        page_title()->setTitle(trans('plugins/shareholder::shareholder.edit') . ' "' . $shareholder->name . '"');

        return $formBuilder->create(ShareholderForm::class, ['model' => $shareholder])->renderForm();
    }

    /**
     * @param int $id
     * @param ShareholderRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, ShareholderRequest $request, BaseHttpResponse $response)
    {
        $shareholder = $this->shareholderRepository->findOrFail($id);

        $shareholder->fill($request->input());

        $shareholder = $this->shareholderRepository->createOrUpdate($shareholder);

        event(new UpdatedContentEvent(SHAREHOLDER_MODULE_SCREEN_NAME, $request, $shareholder));

        return $response
            ->setPreviousUrl(route('shareholder.index'))
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
            $shareholder = $this->shareholderRepository->findOrFail($id);

            $this->shareholderRepository->delete($shareholder);

            event(new DeletedContentEvent(SHAREHOLDER_MODULE_SCREEN_NAME, $request, $shareholder));

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
            $shareholder = $this->shareholderRepository->findOrFail($id);
            $this->shareholderRepository->delete($shareholder);
            event(new DeletedContentEvent(SHAREHOLDER_MODULE_SCREEN_NAME, $request, $shareholder));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
