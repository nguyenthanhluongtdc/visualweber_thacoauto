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
use Platform\Page\Services\PageService;
use Platform\Theme\Events\RenderingSingleEvent;
// use Platform\Partner\Models\Partner;
// use Platform\Services\Models\Services;
use Platform\Base\Http\Responses\BaseHttpResponse;
// use Response;
use Platform\Theme\Http\Controllers\PublicController;
use Platform\Blog\Repositories\Interfaces\PostInterface;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
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
            if($view == 'post' || $view == 'page') {
                Theme::asset()->usePath()->add('reset_css', 'css/non-reset.css');
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
    public function getNewPosts()
    {
        $data['posts'] = $this->postInterface->getOnlyFeaturedByCategoryCreated(15, request('limit', 5));

        return response([
            "data" => Theme::partial('templates/post', $data),
            "disable" => $data['posts']->count() == 0
        ], 200);
    }
}
