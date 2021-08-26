<?php

namespace Platform\DistributionSystem\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\DistributionSystem\Http\Requests\BranchRequest;
use Platform\DistributionSystem\Repositories\Interfaces\BranchInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\DistributionSystem\Tables\BranchTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\DistributionSystem\Forms\BranchForm;
use Platform\Base\Forms\FormBuilder;

class BranchController extends BaseController
{
    /**
     * @var BranchInterface
     */
    protected $branchRepository;

    /**
     * @param BranchInterface $branchRepository
     */
    public function __construct(BranchInterface $branchRepository)
    {
        $this->branchRepository = $branchRepository;
    }

    /**
     * @param BranchTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(BranchTable $table)
    {
        page_title()->setTitle(trans('plugins/distribution-system::branch.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/distribution-system::branch.create'));

        return $formBuilder->create(BranchForm::class)->renderForm();
    }

    /**
     * @param BranchRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(BranchRequest $request, BaseHttpResponse $response)
    {
        $branch = $this->branchRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(BRANCH_MODULE_SCREEN_NAME, $request, $branch));

        return $response
            ->setPreviousUrl(route('branch.index'))
            ->setNextUrl(route('branch.edit', $branch->id))
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
        $branch = $this->branchRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $branch));

        page_title()->setTitle(trans('plugins/distribution-system::branch.edit') . ' "' . $branch->name . '"');

        return $formBuilder->create(BranchForm::class, ['model' => $branch])->renderForm();
    }

    /**
     * @param int $id
     * @param BranchRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, BranchRequest $request, BaseHttpResponse $response)
    {
        $branch = $this->branchRepository->findOrFail($id);

        $branch->fill($request->input());

        $branch = $this->branchRepository->createOrUpdate($branch);

        event(new UpdatedContentEvent(BRANCH_MODULE_SCREEN_NAME, $request, $branch));

        return $response
            ->setPreviousUrl(route('branch.index'))
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
            $branch = $this->branchRepository->findOrFail($id);

            $this->branchRepository->delete($branch);

            event(new DeletedContentEvent(BRANCH_MODULE_SCREEN_NAME, $request, $branch));

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
            $branch = $this->branchRepository->findOrFail($id);
            $this->branchRepository->delete($branch);
            event(new DeletedContentEvent(BRANCH_MODULE_SCREEN_NAME, $request, $branch));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
