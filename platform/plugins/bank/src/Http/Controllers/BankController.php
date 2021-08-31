<?php

namespace Platform\Bank\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\Bank\Http\Requests\BankRequest;
use Platform\Bank\Repositories\Interfaces\BankInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\Bank\Tables\BankTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Bank\Forms\BankForm;
use Platform\Base\Forms\FormBuilder;

class BankController extends BaseController
{
    /**
     * @var BankInterface
     */
    protected $bankRepository;

    /**
     * @param BankInterface $bankRepository
     */
    public function __construct(BankInterface $bankRepository)
    {
        $this->bankRepository = $bankRepository;
    }

    /**
     * @param BankTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(BankTable $table)
    {
        page_title()->setTitle(trans('plugins/bank::bank.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/bank::bank.create'));

        return $formBuilder->create(BankForm::class)->renderForm();
    }

    /**
     * @param BankRequest $request
     * @return BaseHttpResponse
     */
    public function store(BankRequest $request, BaseHttpResponse $response)
    {
        $bank = $this->bankRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(BANK_MODULE_SCREEN_NAME, $request, $bank));

        return $response
            ->setPreviousUrl(route('bank.index'))
            ->setNextUrl(route('bank.edit', $bank->id))
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
        $bank = $this->bankRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $bank));

        page_title()->setTitle(trans('plugins/bank::bank.edit') . ' "' . $bank->name . '"');

        return $formBuilder->create(BankForm::class, ['model' => $bank])->renderForm();
    }

    /**
     * @param $id
     * @param BankRequest $request
     * @return BaseHttpResponse
     */
    public function update($id, BankRequest $request, BaseHttpResponse $response)
    {
        $bank = $this->bankRepository->findOrFail($id);

        $bank->fill($request->input());

        $this->bankRepository->createOrUpdate($bank);

        event(new UpdatedContentEvent(BANK_MODULE_SCREEN_NAME, $request, $bank));

        return $response
            ->setPreviousUrl(route('bank.index'))
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
            $bank = $this->bankRepository->findOrFail($id);

            $this->bankRepository->delete($bank);

            event(new DeletedContentEvent(BANK_MODULE_SCREEN_NAME, $request, $bank));

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
            $bank = $this->bankRepository->findOrFail($id);
            $this->bankRepository->delete($bank);
            event(new DeletedContentEvent(BANK_MODULE_SCREEN_NAME, $request, $bank));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
