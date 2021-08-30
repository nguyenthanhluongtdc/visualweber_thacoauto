<?php

namespace Platform\Deposit\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\Deposit\Http\Requests\DepositRequest;
use Platform\Deposit\Repositories\Interfaces\DepositInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\Deposit\Tables\DepositTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Deposit\Forms\DepositForm;
use Platform\Base\Forms\FormBuilder;

class DepositController extends BaseController
{
    /**
     * @var DepositInterface
     */
    protected $depositRepository;

    /**
     * @param DepositInterface $depositRepository
     */
    public function __construct(DepositInterface $depositRepository)
    {
        $this->depositRepository = $depositRepository;
    }

    /**
     * @param DepositTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(DepositTable $table)
    {
        page_title()->setTitle(trans('plugins/deposit::deposit.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/deposit::deposit.create'));

        return $formBuilder->create(DepositForm::class)->renderForm();
    }

    /**
     * @param DepositRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(DepositRequest $request, BaseHttpResponse $response)
    {
        $deposit = $this->depositRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(DEPOSIT_MODULE_SCREEN_NAME, $request, $deposit));

        return $response
            ->setPreviousUrl(route('deposit.index'))
            ->setNextUrl(route('deposit.edit', $deposit->id))
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
        $deposit = $this->depositRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $deposit));

        page_title()->setTitle(trans('plugins/deposit::deposit.edit') . ' "' . $deposit->name . '"');

        return $formBuilder->create(DepositForm::class, ['model' => $deposit])->renderForm();
    }

    /**
     * @param int $id
     * @param DepositRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, DepositRequest $request, BaseHttpResponse $response)
    {
        $deposit = $this->depositRepository->findOrFail($id);

        $deposit->fill($request->input());

        $deposit = $this->depositRepository->createOrUpdate($deposit);

        event(new UpdatedContentEvent(DEPOSIT_MODULE_SCREEN_NAME, $request, $deposit));

        return $response
            ->setPreviousUrl(route('deposit.index'))
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
            $deposit = $this->depositRepository->findOrFail($id);

            $this->depositRepository->delete($deposit);

            event(new DeletedContentEvent(DEPOSIT_MODULE_SCREEN_NAME, $request, $deposit));

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
            $deposit = $this->depositRepository->findOrFail($id);
            $this->depositRepository->delete($deposit);
            event(new DeletedContentEvent(DEPOSIT_MODULE_SCREEN_NAME, $request, $deposit));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
