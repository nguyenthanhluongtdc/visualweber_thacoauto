<?php

namespace Platform\Bankloans\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\Bankloans\Http\Requests\BankloansRequest;
use Platform\Bankloans\Repositories\Interfaces\BankloansInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\Bankloans\Tables\BankloansTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Bankloans\Forms\BankloansForm;
use Platform\Base\Forms\FormBuilder;

class BankloansController extends BaseController
{
    /**
     * @var BankloansInterface
     */
    protected $bankloansRepository;

    /**
     * @param BankloansInterface $bankloansRepository
     */
    public function __construct(BankloansInterface $bankloansRepository)
    {
        $this->bankloansRepository = $bankloansRepository;
    }

    /**
     * @param BankloansTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(BankloansTable $table)
    {
        page_title()->setTitle(trans('plugins/bankloans::bankloans.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/bankloans::bankloans.create'));

        return $formBuilder->create(BankloansForm::class)->renderForm();
    }

    /**
     * @param BankloansRequest $request
     * @return BaseHttpResponse
     */
    public function store(BankloansRequest $request, BaseHttpResponse $response)
    {
        $bankloans = $this->bankloansRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(BANKLOANS_MODULE_SCREEN_NAME, $request, $bankloans));

        return $response
            ->setPreviousUrl(route('bankloans.index'))
            ->setNextUrl(route('bankloans.edit', $bankloans->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function edit($id, FormBuilder $formBuilder, Request $request)
    {
        $bankloans = $this->bankloansRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $bankloans));

        page_title()->setTitle(trans('plugins/bankloans::bankloans.edit') . ' "' . $bankloans->name . '"');

        return $formBuilder->create(BankloansForm::class, ['model' => $bankloans])->renderForm();
    }

    /**
     * @param $id
     * @param BankloansRequest $request
     * @return BaseHttpResponse
     */
    public function update($id, BankloansRequest $request, BaseHttpResponse $response)
    {
        $bankloans = $this->bankloansRepository->findOrFail($id);

        $bankloans->fill($request->input());

        $this->bankloansRepository->createOrUpdate($bankloans);

        event(new UpdatedContentEvent(BANKLOANS_MODULE_SCREEN_NAME, $request, $bankloans));

        return $response
            ->setPreviousUrl(route('bankloans.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return BaseHttpResponse
     */
    public function destroy(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $bankloans = $this->bankloansRepository->findOrFail($id);

            $this->bankloansRepository->delete($bankloans);

            event(new DeletedContentEvent(BANKLOANS_MODULE_SCREEN_NAME, $request, $bankloans));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.cannot_delete'));
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
            $bankloans = $this->bankloansRepository->findOrFail($id);
            $this->bankloansRepository->delete($bankloans);
            event(new DeletedContentEvent(BANKLOANS_MODULE_SCREEN_NAME, $request, $bankloans));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
