<?php

namespace Theme\Thaco\Http\Controllers;

use Theme;
use RvMedia;
use SeoHelper;
use BaseHelper;
use SlugHelper;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Platform\Page\Models\Page;
use Illuminate\Support\Facades\Log;
use Platform\Base\Enums\BaseStatusEnum;
// use Platform\Partner\Models\Partner;
// use Platform\Services\Models\Services;
use Platform\Page\Services\PageService;
// use Response;
use Symfony\Component\HttpFoundation\Response;
use Platform\Theme\Events\RenderingSingleEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Theme\Http\Controllers\PublicController;
use Platform\Blog\Repositories\Interfaces\PostInterface;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Platform\DistributionSystem\Repositories\Interfaces\DistributionSystemInterface;
use Platform\Kernel\Repositories\Interfaces\PostInterface as InterfacesPostInterface;

class ThacoController extends PublicController
{
    protected $postInterface;

    public function __construct()
    {
        $this->postInterface = app(InterfacesPostInterface::class);
        Theme::asset()->usePath()->add('reset_css', 'css/reset.css');
    }

    /**
     * {@inheritDoc}
     */
    public function getIndex()
    {
        SeoHelper::setTitle(theme_option('seo_title', 'Thaco Auto'))
            ->setDescription(theme_option('seo_description', 'Thaco Auto'))
            ->openGraph()
            ->setTitle(@theme_option('seo_title'))
            ->setSiteName(@theme_option('site_title'))
            ->setUrl(route('public.index'))
            ->setImage(RvMedia::getImageUrl(theme_option('seo_og_image'), 'og'))
            ->addProperty('image:width', '1200')
            ->addProperty('image:height', '630');

        if (defined('PAGE_MODULE_SCREEN_NAME')) {
            $homepageId = BaseHelper::getHomepageId();
            if ($homepageId) {
                $slug = SlugHelper::getSlug(null, SlugHelper::getPrefix(Page::class), Page::class, $homepageId);

                if ($slug) {
                    $data = (new PageService)->handleFrontRoutes($slug);

                    Theme::layout('default');
                    return Theme::scope('index', $data['data'], $data['default_view'])->render();
                }
            }
        }

        SeoHelper::setTitle(theme_option('site_title'));

        Theme::breadcrumb()->add(__('Home'), route('public.index'));

        event(RenderingHomePageEvent::class);
    }

    /**
     * {@inheritDoc}
     */
    public function getView($key = null)
    {
        SeoHelper::setTitle(theme_option('seo_title', 'ThacoAuto'))
            ->setDescription(theme_option('seo_description', 'ThacoAuto'))
            ->openGraph()
            ->setTitle(@theme_option('seo_title'))
            ->setSiteName(@theme_option('site_title'))
            ->setUrl(route('public.index'))
            ->setImage(RvMedia::getImageUrl(theme_option('seo_og_image'), 'og'))
            ->addProperty('image:width', '1200')
            ->addProperty('image:height', '630');

        if (empty($key)) {
            return $this->getIndex();
        }


        $slug = SlugHelper::getSlug($key, '');

        if (!$slug) {
            abort(404);
        }

        if (defined('PAGE_MODULE_SCREEN_NAME')) {
            if ($slug->reference_type == Page::class && BaseHelper::isHomepage($slug->reference_id)) {
                return redirect()->to('/');
            }
        }

        $result = apply_filters(BASE_FILTER_PUBLIC_SINGLE_DATA, $slug);

        if (isset($result['slug']) && $result['slug'] !== $key) {
            return redirect()->route('public.single', $result['slug']);
        }

        event(new RenderingSingleEvent($slug));
        Theme::layout('default');

        if (!empty($result) && is_array($result)) {
            $view = isset(Arr::get($result, 'data.page')->template) ? Arr::get($result, 'data.page')->template : Arr::get($result, 'view', '');
            if ($view == 'post' || $view == 'page') {
                Theme::asset()->usePath()->add('reset_css', 'css/non-reset.css');
            }
            if (request('select_category') && Arr::get($result, 'default_view', '') == 'plugins/blog::themes.category') {
                return redirect()->route('public.single', array_merge(
                    request()->except('select_category'),
                    ['slug' => request('select_category')]
                ));
            }
            return Theme::scope($view, $result['data'], Arr::get($result, 'default_view'))->render();
        }
        abort(404);
    }

    /**
     * {@inheritDoc}
     */
    public function getSiteMap()
    {
        return parent::getSiteMap();
    }

    /**
     * Search post
     *
     * @bodyParam q string required The search keyword.
     *
     * @group Blog
     *
     * @param Request $request
     * @param PostInterface $postRepository
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     *
     * @throws FileNotFoundException
     */
    public function getSearch(Request $request, PostInterface $postRepository, BaseHttpResponse $response)
    {
        $query = $request->input('q');

        if (!empty($query)) {
            $posts = $postRepository->getSearch($query);

            $data = [
                'items' => Theme::partial('search', compact('posts')),
                'query' => $query,
                'count' => $posts->count(),
            ];

            if ($data['count'] > 0) {
                return $response->setData(apply_filters(BASE_FILTER_SET_DATA_SEARCH, $data, 10, 1));
            }
        }

        return $response
            ->setError()
            ->setMessage(__('No results found, please try with different keywords.'));
    }

    public function getResultSearch(Request $request, PostInterface $postRepository)
    {
        // if($request->ajax() && $request->has('cate')) {
        //     $data = get_posts_by_category($request->input('cate'), 5);
        //     return view("theme.main::views.components.result-search", compact('data'))->render();
        // }

        $query = $request->input('keyword');

        if (!$query) {
            return Theme::scope('search')
                ->render();
        }

        $title = __('Search result for: ":query"', compact('query'));

        SeoHelper::setTitle($title)
            ->setDescription($title);

        $posts = $postRepository->getSearch($query, 0, 5);

        // Theme::breadcrumb()
        //     ->add(__('Home'), route('public.index'))
        //     ->add($title, route('public.search'));

        $comment = $posts->total() . __('kết quả được tìm thấy') .
            "<strong class='text-uppercase color-pri font20'> $query </strong>";

        return Theme::scope('search', compact(['posts', 'comment']))
            ->render();
    }

    public function getNewPosts()
    {
        $data['posts'] = $this->postInterface->getOnlyFeaturedByCategoryCreated(15, request('limit', 5));

        return response([
            "data" => Theme::partial('templates/post', $data),
            "disable" => $data['posts']->count() == 0
        ], 200);
    }

    public function getDistributionSystem(Request $request, DistributionSystemInterface $distributionSystemInterface) {
        try {
            Log::info("======== Lấy danh sách chi nhánh theo Tỉnh/Thành phố: {$request->city} =========");
            $distributionSystems = $distributionSystemInterface->advancedGet(['condition' => [
                'status' => BaseStatusEnum::PUBLISHED,
                'city_id' => $request->city
            ]]);
            $html_list = view('theme.main::views.pages.distribution-system.ajax.list', compact('distributionSystems'))->render();
            return response()->json([
                'type' => 'success',
                'html_list' => $html_list,
            ])->setStatusCode(Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error("Lỗi lấy danh sách chi nhánh theo Tỉnh/Thành phố", [$th->getMessage(), $th->getFile(), $th->getLine()]);
            return response()->json([
                'type' => 'error',
                'message' => 'Rất tiếc đã xảy ra lỗi khi lấy danh sách chi nhánh theo Tỉnh/Thành phố'
            ])->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getFirstStepCarSelection(BaseHttpResponse $response)
    {
        return $response
            ->setData([
                "template" => \Theme::partial('templates.car-selection.step-first')
            ]);
    }
}
