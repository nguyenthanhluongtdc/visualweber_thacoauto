<?php

namespace Platform\TestDrive\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\TestDrive\Http\Requests\TestDriveRequest;
use Platform\TestDrive\Repositories\Interfaces\TestDriveInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\TestDrive\Tables\TestDriveTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\TestDrive\Forms\TestDriveForm;
use Platform\Base\Forms\FormBuilder;

class TestDriveController extends BaseController
{
    /**
     * @var TestDriveInterface
     */
    protected $testDriveRepository;

    /**
     * @param TestDriveInterface $testDriveRepository
     */
    public function __construct(TestDriveInterface $testDriveRepository)
    {
        $this->testDriveRepository = $testDriveRepository;
    }

    /**
     * @param TestDriveTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(TestDriveTable $table)
    {
        page_title()->setTitle(trans('plugins/test-drive::test-drive.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/test-drive::test-drive.create'));

        return $formBuilder->create(TestDriveForm::class)->renderForm();
    }

    /**
     * @param TestDriveRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(TestDriveRequest $request, BaseHttpResponse $response)
    {
        $testDrive = $this->testDriveRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(TEST_DRIVE_MODULE_SCREEN_NAME, $request, $testDrive));

        return $response
            ->setPreviousUrl(route('test-drive.index'))
            ->setNextUrl(route('test-drive.edit', $testDrive->id))
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
        $testDrive = $this->testDriveRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $testDrive));

        page_title()->setTitle(trans('plugins/test-drive::test-drive.edit') . ' "' . $testDrive->name . '"');

        return $formBuilder->create(TestDriveForm::class, ['model' => $testDrive])->renderForm();
    }

    /**
     * @param int $id
     * @param TestDriveRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, TestDriveRequest $request, BaseHttpResponse $response)
    {
        $testDrive = $this->testDriveRepository->findOrFail($id);

        $testDrive->fill($request->input());

        $testDrive = $this->testDriveRepository->createOrUpdate($testDrive);

        event(new UpdatedContentEvent(TEST_DRIVE_MODULE_SCREEN_NAME, $request, $testDrive));

        return $response
            ->setPreviousUrl(route('test-drive.index'))
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
            $testDrive = $this->testDriveRepository->findOrFail($id);

            $this->testDriveRepository->delete($testDrive);

            event(new DeletedContentEvent(TEST_DRIVE_MODULE_SCREEN_NAME, $request, $testDrive));

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
            $testDrive = $this->testDriveRepository->findOrFail($id);
            $this->testDriveRepository->delete($testDrive);
            event(new DeletedContentEvent(TEST_DRIVE_MODULE_SCREEN_NAME, $request, $testDrive));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
