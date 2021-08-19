<?php

namespace Platform\Comment\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\Comment\Http\Requests\CommentRequest;
use Platform\Comment\Repositories\Interfaces\CommentInterface;
use Platform\Base\Http\Controllers\BaseController;
use Platform\Comment\Supports\CloneUserToCommentUser;
use Platform\Comment\Supports\Updater;
use Platform\Setting\Supports\SettingStore;
use Illuminate\Http\Request;
use Exception;
use Platform\Comment\Tables\CommentTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Comment\Forms\CommentForm;
use Platform\Base\Forms\FormBuilder;
use Assets;
use File;

class CommentController extends BaseController
{
    /**
     * @var CommentInterface
     */
    protected $commentRepository;

    /**
     * @param CommentInterface $commentRepository
     */
    public function __construct(CommentInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @param CommentTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(CommentTable $table)
    {
        page_title()->setTitle(trans('plugins/comment::comment.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/comment::comment.create'));

        return $formBuilder->create(CommentForm::class)->renderForm();
    }

    /**
     * @param CommentRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(CommentRequest $request, BaseHttpResponse $response)
    {
        $comment = $this->commentRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(COMMENT_MODULE_SCREEN_NAME, $request, $comment));

        return $response
            ->setPreviousUrl(route('comment.index'))
            ->setNextUrl(route('comment.edit', $comment->id))
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
        $comment = $this->commentRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $comment));

        page_title()->setTitle(trans('plugins/comment::comment.edit') . ' "' . $comment->name . '"');

        return $formBuilder->create(CommentForm::class, ['model' => $comment])->renderForm();
    }

    /**
     * @param int $id
     * @param CommentRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, CommentRequest $request, BaseHttpResponse $response)
    {
        $comment = $this->commentRepository->findOrFail($id);

        $comment->fill($request->input());

        $this->commentRepository->createOrUpdate($comment);

        event(new UpdatedContentEvent(COMMENT_MODULE_SCREEN_NAME, $request, $comment));

        return $response
            ->setPreviousUrl(route('comment.index'))
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
            $comment = $this->commentRepository->findOrFail($id);

            $this->commentRepository->delete($comment);

            event(new DeletedContentEvent(COMMENT_MODULE_SCREEN_NAME, $request, $comment));

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
            $comment = $this->commentRepository->findOrFail($id);
            $this->commentRepository->delete($comment);
            event(new DeletedContentEvent(COMMENT_MODULE_SCREEN_NAME, $request, $comment));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }

    // Settings

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getSettings()
    {
        page_title()->setTitle(trans('plugins/comment::comment.name'));

        Assets::addScriptsDirectly('vendor/core/plugins/comment/js/comment-setting.js');

        $pluginPath = plugin_path('comment');
        $pluginPublicPath = public_path('vendor/core/plugins');
        $canUpdate = [];

        if (!File::isWritable($pluginPublicPath)) {
            $canUpdate[] = trans('packages/plugin-management::plugin.folder_is_not_writeable', ['name' => $pluginPublicPath]);
        }

        if (!File::isWritable($pluginPath)) {
            $canUpdate[] = trans('packages/plugin-management::plugin.folder_is_not_writeable', ['name' => $pluginPath]);
        }

        if (!extension_loaded('curl')) {
            $canUpdate[] = 'cURL extension is not active';
        }

        $updateProgress = json_decode(setting('comment_plugin_update_progress', '{"step": 1}'));

        return view('plugins/comment::settings', [
            'can_update'        => $canUpdate,
            'update_step'       => (int)$updateProgress->step > 1,
            'update_step_msg'   => Updater::$stepMessage[$updateProgress->step]
        ]);
    }

    /**
     * @param Request $request
     * @param SettingStore $settingStore
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function storeSettings(Request $request, SettingStore $settingStore, BaseHttpResponse $response)
    {
        foreach ($request->except(['_token']) as $key => $setting) {

            if (is_array($setting)) {
                $setting = json_encode($setting);
            }

            $settingStore->set($key, $setting);
        }

        $settingStore->save();

        return $response
            ->setPreviousUrl(route('comment.setting'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function cloneUser(CloneUserToCommentUser $cloneUserToCommentUser, Request $request, BaseHttpResponse $response)
    {
        $clonedUser = $cloneUserToCommentUser->handle($request);

        if (!$clonedUser) {
            return $response->setError();
        }

        if (has_passport()) {
            return $response->setData(['token' => $clonedUser->createToken('Comment User Login')->accessToken]);
        }

        auth()->guard(COMMENT_GUARD)->loginUsingId($clonedUser->id);

        return $response->setData(['token' => $clonedUser->id]);
    }
}