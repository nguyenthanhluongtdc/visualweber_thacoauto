<?php

namespace Platform\DistributionSystem\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\DistributionSystem\Http\Requests\ShowroomRequest;
use Platform\DistributionSystem\Repositories\Interfaces\ShowroomInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\DistributionSystem\Tables\ShowroomTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\DistributionSystem\Forms\ShowroomForm;
use Platform\Base\Forms\FormBuilder;

class ShowroomController extends BaseController
{
    /**
     * @var ShowroomInterface
     */
    protected $showroomRepository;

    /**
     * @param ShowroomInterface $showroomRepository
     */
    public function __construct(ShowroomInterface $showroomRepository)
    {
        $this->showroomRepository = $showroomRepository;
    }

    /**
     * @param ShowroomTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(ShowroomTable $table)
    {
        page_title()->setTitle(trans('plugins/distribution-system::showroom.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/distribution-system::showroom.create'));

        return $formBuilder->create(ShowroomForm::class)->renderForm();
    }

    /**
     * @param ShowroomRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(ShowroomRequest $request, BaseHttpResponse $response)
    {
        $showroom = $this->showroomRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(SHOWROOM_MODULE_SCREEN_NAME, $request, $showroom));

        return $response
            ->setPreviousUrl(route('showroom.index'))
            ->setNextUrl(route('showroom.edit', $showroom->id))
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
        $showroom = $this->showroomRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $showroom));

        page_title()->setTitle(trans('plugins/distribution-system::showroom.edit') . ' "' . $showroom->name . '"');

        return $formBuilder->create(ShowroomForm::class, ['model' => $showroom])->renderForm();
    }

    /**
     * @param int $id
     * @param ShowroomRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, ShowroomRequest $request, BaseHttpResponse $response)
    {
        $showroom = $this->showroomRepository->findOrFail($id);

        $showroom->fill($request->input());

        $showroom = $this->showroomRepository->createOrUpdate($showroom);

        event(new UpdatedContentEvent(SHOWROOM_MODULE_SCREEN_NAME, $request, $showroom));

        return $response
            ->setPreviousUrl(route('showroom.index'))
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
            $showroom = $this->showroomRepository->findOrFail($id);

            $this->showroomRepository->delete($showroom);

            event(new DeletedContentEvent(SHOWROOM_MODULE_SCREEN_NAME, $request, $showroom));

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
            $showroom = $this->showroomRepository->findOrFail($id);
            $this->showroomRepository->delete($showroom);
            event(new DeletedContentEvent(SHOWROOM_MODULE_SCREEN_NAME, $request, $showroom));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
