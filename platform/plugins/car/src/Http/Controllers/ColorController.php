<?php

namespace Platform\Car\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\Car\Http\Requests\ColorRequest;
use Platform\Car\Repositories\Interfaces\ColorInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\Car\Tables\ColorTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Car\Forms\ColorForm;
use Platform\Base\Forms\FormBuilder;
use Illuminate\Support\Facades\Auth;

class ColorController extends BaseController
{
    /**
     * @var ColorInterface
     */
    protected $colorRepository;

    /**
     * @param ColorInterface $colorRepository
     */
    public function __construct(ColorInterface $colorRepository)
    {
        $this->colorRepository = $colorRepository;
    }

    /**
     * @param ColorTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(ColorTable $table)
    {
        page_title()->setTitle(trans('plugins/car::color.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/car::color.create'));

        return $formBuilder->create(ColorForm::class)->renderForm();
    }

    /**
     * @param ColorRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(ColorRequest $request, BaseHttpResponse $response)
    {
        $color = $this->colorRepository->createOrUpdate(array_merge($request->input(), [
            'author_id'   => Auth::id(),
            'author_type' => \Platform\ACL\Models\User::class,
        ]));

        event(new CreatedContentEvent(COLOR_MODULE_SCREEN_NAME, $request, $color));

        return $response
            ->setPreviousUrl(route('color.index'))
            ->setNextUrl(route('color.edit', $color->id))
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
        $color = $this->colorRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $color));

        page_title()->setTitle(trans('plugins/car::color.edit') . ' "' . $color->name . '"');

        return $formBuilder->create(ColorForm::class, ['model' => $color])->renderForm();
    }

    /**
     * @param int $id
     * @param ColorRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, ColorRequest $request, BaseHttpResponse $response)
    {
        $color = $this->colorRepository->findOrFail($id);

        $color->fill($request->input());

        $color = $this->colorRepository->createOrUpdate($color);

        event(new UpdatedContentEvent(COLOR_MODULE_SCREEN_NAME, $request, $color));

        return $response
            ->setPreviousUrl(route('color.index'))
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
            $color = $this->colorRepository->findOrFail($id);

            $this->colorRepository->delete($color);

            event(new DeletedContentEvent(COLOR_MODULE_SCREEN_NAME, $request, $color));

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
            $color = $this->colorRepository->findOrFail($id);
            $this->colorRepository->delete($color);
            event(new DeletedContentEvent(COLOR_MODULE_SCREEN_NAME, $request, $color));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
