<?php

namespace Platform\Car\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\Car\Http\Requests\EquipmentRequest;
use Platform\Car\Repositories\Interfaces\EquipmentInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\Car\Tables\EquipmentTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Car\Forms\EquipmentForm;
use Platform\Base\Forms\FormBuilder;
use Illuminate\Support\Str;

class EquipmentController extends BaseController
{
    /**
     * @var EquipmentInterface
     */
    protected $equipmentRepository;

    /**
     * @param EquipmentInterface $equipmentRepository
     */
    public function __construct(EquipmentInterface $equipmentRepository)
    {
        $this->equipmentRepository = $equipmentRepository;
    }

    /**
     * @param EquipmentTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(EquipmentTable $table)
    {
        page_title()->setTitle(trans('plugins/car::equipment.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/car::equipment.create'));

        return $formBuilder->create(EquipmentForm::class)->renderForm();
    }

    /**
     * @param EquipmentRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(EquipmentRequest $request, BaseHttpResponse $response)
    {
        $slug = \Illuminate\Support\Str::slug($request->get('name'),'-');
        $checkSlug = $this->equipmentRepository->getFirstBy([
            'slug'=>$slug
        ]);
        $slug = $slug.'-'.time();
        $request->merge(['slug' => $slug]);
        $equipment = $this->equipmentRepository->createOrUpdate($request->input());

        // store car
        $categories = $request->input('cars');
        if (!empty($categories) && is_array($categories)) {
            $equipment->cars()->sync($categories);
        }

        event(new CreatedContentEvent(EQUIPMENT_MODULE_SCREEN_NAME, $request, $equipment));

        return $response
            ->setPreviousUrl(route('equipment.index'))
            ->setNextUrl(route('equipment.edit', $equipment->id))
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
        $equipment = $this->equipmentRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $equipment));

        page_title()->setTitle(trans('plugins/car::equipment.edit') . ' "' . $equipment->name . '"');

        return $formBuilder->create(EquipmentForm::class, ['model' => $equipment])->renderForm();
    }

    /**
     * @param int $id
     * @param EquipmentRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, EquipmentRequest $request, BaseHttpResponse $response)
    {
        $slug = \Illuminate\Support\Str::slug($request->get('name'),'-');
        $checkSlug = \Platform\Car\Models\Equipment::where('slug',$slug)->whereNotIn('id',[$id])->first();
        $slug = $slug.'-'.time();
        $request->merge(['slug' => $slug]);

        $equipment = $this->equipmentRepository->findOrFail($id);

        $equipment->fill($request->input());

        $equipment = $this->equipmentRepository->createOrUpdate($equipment);

        // store car
        $categories = $request->input('cars');
        if (!empty($categories) && is_array($categories)) {
            $equipment->cars()->sync($categories);
        }

        event(new UpdatedContentEvent(EQUIPMENT_MODULE_SCREEN_NAME, $request, $equipment));

        return $response
            ->setPreviousUrl(route('equipment.index'))
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
            $equipment = $this->equipmentRepository->findOrFail($id);

            $this->equipmentRepository->delete($equipment);

            event(new DeletedContentEvent(EQUIPMENT_MODULE_SCREEN_NAME, $request, $equipment));

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
            $equipment = $this->equipmentRepository->findOrFail($id);
            $this->equipmentRepository->delete($equipment);
            event(new DeletedContentEvent(EQUIPMENT_MODULE_SCREEN_NAME, $request, $equipment));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
