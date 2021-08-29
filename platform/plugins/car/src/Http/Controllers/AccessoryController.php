<?php

namespace Platform\Car\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\Car\Http\Requests\AccessoryRequest;
use Platform\Car\Repositories\Interfaces\AccessoryInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\Car\Tables\AccessoryTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Car\Forms\AccessoryForm;
use Platform\Base\Forms\FormBuilder;

class AccessoryController extends BaseController
{
    /**
     * @var AccessoryInterface
     */
    protected $accessoryRepository;

    /**
     * @param AccessoryInterface $accessoryRepository
     */
    public function __construct(AccessoryInterface $accessoryRepository)
    {
        $this->accessoryRepository = $accessoryRepository;
    }

    /**
     * @param AccessoryTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(AccessoryTable $table)
    {
        page_title()->setTitle(trans('plugins/car::accessory.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/car::accessory.create'));

        return $formBuilder->create(AccessoryForm::class)->renderForm();
    }

    /**
     * @param AccessoryRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(AccessoryRequest $request, BaseHttpResponse $response)
    {
        $accessory = $this->accessoryRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(ACCESSORY_MODULE_SCREEN_NAME, $request, $accessory));

        return $response
            ->setPreviousUrl(route('accessory.index'))
            ->setNextUrl(route('accessory.edit', $accessory->id))
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
        $accessory = $this->accessoryRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $accessory));

        page_title()->setTitle(trans('plugins/car::accessory.edit') . ' "' . $accessory->name . '"');

        return $formBuilder->create(AccessoryForm::class, ['model' => $accessory])->renderForm();
    }

    /**
     * @param int $id
     * @param AccessoryRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, AccessoryRequest $request, BaseHttpResponse $response)
    {
        $accessory = $this->accessoryRepository->findOrFail($id);

        $accessory->fill($request->input());

        $accessory = $this->accessoryRepository->createOrUpdate($accessory);

        event(new UpdatedContentEvent(ACCESSORY_MODULE_SCREEN_NAME, $request, $accessory));

        return $response
            ->setPreviousUrl(route('accessory.index'))
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
            $accessory = $this->accessoryRepository->findOrFail($id);

            $this->accessoryRepository->delete($accessory);

            event(new DeletedContentEvent(ACCESSORY_MODULE_SCREEN_NAME, $request, $accessory));

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
            $accessory = $this->accessoryRepository->findOrFail($id);
            $this->accessoryRepository->delete($accessory);
            event(new DeletedContentEvent(ACCESSORY_MODULE_SCREEN_NAME, $request, $accessory));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
