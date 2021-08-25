<?php

namespace Platform\DistributionSystem\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\DistributionSystem\Http\Requests\DistributionSystemRequest;
use Platform\DistributionSystem\Repositories\Interfaces\DistributionSystemInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\DistributionSystem\Tables\DistributionSystemTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\DistributionSystem\Forms\DistributionSystemForm;
use Platform\Base\Forms\FormBuilder;

class DistributionSystemController extends BaseController
{
    /**
     * @var DistributionSystemInterface
     */
    protected $distributionSystemRepository;

    /**
     * @param DistributionSystemInterface $distributionSystemRepository
     */
    public function __construct(DistributionSystemInterface $distributionSystemRepository)
    {
        $this->distributionSystemRepository = $distributionSystemRepository;
    }

    /**
     * @param DistributionSystemTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(DistributionSystemTable $table)
    {
        page_title()->setTitle(trans('plugins/distribution-system::distribution-system.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/distribution-system::distribution-system.create'));

        return $formBuilder->create(DistributionSystemForm::class)->renderForm();
    }

    /**
     * @param DistributionSystemRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(DistributionSystemRequest $request, BaseHttpResponse $response)
    {
        $distributionSystem = $this->distributionSystemRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(DISTRIBUTION_SYSTEM_MODULE_SCREEN_NAME, $request, $distributionSystem));

        return $response
            ->setPreviousUrl(route('distribution-system.index'))
            ->setNextUrl(route('distribution-system.edit', $distributionSystem->id))
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
        $distributionSystem = $this->distributionSystemRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $distributionSystem));

        page_title()->setTitle(trans('plugins/distribution-system::distribution-system.edit') . ' "' . $distributionSystem->name . '"');

        return $formBuilder->create(DistributionSystemForm::class, ['model' => $distributionSystem])->renderForm();
    }

    /**
     * @param int $id
     * @param DistributionSystemRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, DistributionSystemRequest $request, BaseHttpResponse $response)
    {
        $distributionSystem = $this->distributionSystemRepository->findOrFail($id);

        $distributionSystem->fill($request->input());

        $distributionSystem = $this->distributionSystemRepository->createOrUpdate($distributionSystem);

        event(new UpdatedContentEvent(DISTRIBUTION_SYSTEM_MODULE_SCREEN_NAME, $request, $distributionSystem));

        return $response
            ->setPreviousUrl(route('distribution-system.index'))
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
            $distributionSystem = $this->distributionSystemRepository->findOrFail($id);

            $this->distributionSystemRepository->delete($distributionSystem);

            event(new DeletedContentEvent(DISTRIBUTION_SYSTEM_MODULE_SCREEN_NAME, $request, $distributionSystem));

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
            $distributionSystem = $this->distributionSystemRepository->findOrFail($id);
            $this->distributionSystemRepository->delete($distributionSystem);
            event(new DeletedContentEvent(DISTRIBUTION_SYSTEM_MODULE_SCREEN_NAME, $request, $distributionSystem));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
