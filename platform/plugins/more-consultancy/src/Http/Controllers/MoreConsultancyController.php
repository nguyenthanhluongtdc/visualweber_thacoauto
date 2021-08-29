<?php

namespace Platform\MoreConsultancy\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\MoreConsultancy\Http\Requests\MoreConsultancyRequest;
use Platform\MoreConsultancy\Repositories\Interfaces\MoreConsultancyInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\MoreConsultancy\Tables\MoreConsultancyTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\MoreConsultancy\Forms\MoreConsultancyForm;
use Platform\Base\Forms\FormBuilder;

class MoreConsultancyController extends BaseController
{
    /**
     * @var MoreConsultancyInterface
     */
    protected $moreConsultancyRepository;

    /**
     * @param MoreConsultancyInterface $moreConsultancyRepository
     */
    public function __construct(MoreConsultancyInterface $moreConsultancyRepository)
    {
        $this->moreConsultancyRepository = $moreConsultancyRepository;
    }

    /**
     * @param MoreConsultancyTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(MoreConsultancyTable $table)
    {
        page_title()->setTitle(trans('plugins/more-consultancy::more-consultancy.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/more-consultancy::more-consultancy.create'));

        return $formBuilder->create(MoreConsultancyForm::class)->renderForm();
    }

    /**
     * @param MoreConsultancyRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(MoreConsultancyRequest $request, BaseHttpResponse $response)
    {
        $moreConsultancy = $this->moreConsultancyRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(MORE_CONSULTANCY_MODULE_SCREEN_NAME, $request, $moreConsultancy));

        return $response
            ->setPreviousUrl(route('more-consultancy.index'))
            ->setNextUrl(route('more-consultancy.edit', $moreConsultancy->id))
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
        $moreConsultancy = $this->moreConsultancyRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $moreConsultancy));

        page_title()->setTitle(trans('plugins/more-consultancy::more-consultancy.edit') . ' "' . $moreConsultancy->name . '"');

        return $formBuilder->create(MoreConsultancyForm::class, ['model' => $moreConsultancy])->renderForm();
    }

    /**
     * @param int $id
     * @param MoreConsultancyRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, MoreConsultancyRequest $request, BaseHttpResponse $response)
    {
        $moreConsultancy = $this->moreConsultancyRepository->findOrFail($id);

        $moreConsultancy->fill($request->input());

        $moreConsultancy = $this->moreConsultancyRepository->createOrUpdate($moreConsultancy);

        event(new UpdatedContentEvent(MORE_CONSULTANCY_MODULE_SCREEN_NAME, $request, $moreConsultancy));

        return $response
            ->setPreviousUrl(route('more-consultancy.index'))
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
            $moreConsultancy = $this->moreConsultancyRepository->findOrFail($id);

            $this->moreConsultancyRepository->delete($moreConsultancy);

            event(new DeletedContentEvent(MORE_CONSULTANCY_MODULE_SCREEN_NAME, $request, $moreConsultancy));

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
            $moreConsultancy = $this->moreConsultancyRepository->findOrFail($id);
            $this->moreConsultancyRepository->delete($moreConsultancy);
            event(new DeletedContentEvent(MORE_CONSULTANCY_MODULE_SCREEN_NAME, $request, $moreConsultancy));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
