<?php

namespace Platform\Shareholdercateogry\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\Shareholdercateogry\Http\Requests\ShareholdercateogryRequest;
use Platform\Shareholdercateogry\Repositories\Interfaces\ShareholdercateogryInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\Shareholdercateogry\Tables\ShareholdercateogryTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Shareholdercateogry\Forms\ShareholdercateogryForm;
use Platform\Base\Forms\FormBuilder;

class ShareholdercateogryController extends BaseController
{
    /**
     * @var ShareholdercateogryInterface
     */
    protected $shareholdercateogryRepository;

    /**
     * @param ShareholdercateogryInterface $shareholdercateogryRepository
     */
    public function __construct(ShareholdercateogryInterface $shareholdercateogryRepository)
    {
        $this->shareholdercateogryRepository = $shareholdercateogryRepository;
    }

    /**
     * @param ShareholdercateogryTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(ShareholdercateogryTable $table)
    {
        page_title()->setTitle(trans('plugins/shareholdercateogry::shareholdercateogry.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/shareholdercateogry::shareholdercateogry.create'));

        return $formBuilder->create(ShareholdercateogryForm::class)->renderForm();
    }

    /**
     * @param ShareholdercateogryRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(ShareholdercateogryRequest $request, BaseHttpResponse $response)
    {
        $shareholdercateogry = $this->shareholdercateogryRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(SHAREHOLDERCATEOGRY_MODULE_SCREEN_NAME, $request, $shareholdercateogry));

        return $response
            ->setPreviousUrl(route('shareholdercateogry.index'))
            ->setNextUrl(route('shareholdercateogry.edit', $shareholdercateogry->id))
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
        $shareholdercateogry = $this->shareholdercateogryRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $shareholdercateogry));

        page_title()->setTitle(trans('plugins/shareholdercateogry::shareholdercateogry.edit') . ' "' . $shareholdercateogry->name . '"');

        return $formBuilder->create(ShareholdercateogryForm::class, ['model' => $shareholdercateogry])->renderForm();
    }

    /**
     * @param int $id
     * @param ShareholdercateogryRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, ShareholdercateogryRequest $request, BaseHttpResponse $response)
    {
        $shareholdercateogry = $this->shareholdercateogryRepository->findOrFail($id);

        $shareholdercateogry->fill($request->input());

        $shareholdercateogry = $this->shareholdercateogryRepository->createOrUpdate($shareholdercateogry);

        event(new UpdatedContentEvent(SHAREHOLDERCATEOGRY_MODULE_SCREEN_NAME, $request, $shareholdercateogry));

        return $response
            ->setPreviousUrl(route('shareholdercateogry.index'))
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
            $shareholdercateogry = $this->shareholdercateogryRepository->findOrFail($id);

            $this->shareholdercateogryRepository->delete($shareholdercateogry);

            event(new DeletedContentEvent(SHAREHOLDERCATEOGRY_MODULE_SCREEN_NAME, $request, $shareholdercateogry));

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
            $shareholdercateogry = $this->shareholdercateogryRepository->findOrFail($id);
            $this->shareholdercateogryRepository->delete($shareholdercateogry);
            event(new DeletedContentEvent(SHAREHOLDERCATEOGRY_MODULE_SCREEN_NAME, $request, $shareholdercateogry));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
