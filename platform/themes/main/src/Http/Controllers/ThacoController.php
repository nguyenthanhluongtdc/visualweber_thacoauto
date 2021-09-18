<?php

namespace Theme\Thaco\Http\Controllers;

use Theme;
use RvMedia;
use SeoHelper;
use BaseHelper;
use SlugHelper;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Platform\Blog\Models\Post;
use Platform\Blog\Models\Category;
use Platform\Blog\Services\BlogService;
use Platform\Page\Models\Page;
use Illuminate\Support\Facades\Log;
use Platform\Base\Enums\BaseStatusEnum;
// use Platform\Partner\Models\Partner;
// use Platform\Services\Models\Services;
use Platform\Page\Services\PageService;
// use Response;
use Platform\Bankloans\Models\Bankloans;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\Response;
use Platform\Theme\Events\RenderingSingleEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Theme\Http\Controllers\PublicController;
use Platform\Blog\Repositories\Interfaces\PostInterface;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Platform\Bank\Models\Bank;
use Platform\Bankloans\Repositories\Interfaces\BankloansInterface;
use Platform\DistributionSystem\Repositories\Interfaces\ShowroomInterface;
use Platform\DistributionSystem\Repositories\Interfaces\ShowroomBrandInterface;
use Platform\DistributionSystem\Repositories\Interfaces\DistributionSystemInterface;
use Platform\Kernel\Repositories\Interfaces\PostInterface as InterfacesPostInterface;
use Platform\Shareholdercateogry\Models\Shareholdercateogry;

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

    public function getNewPosts()
    {
        $data['posts'] = $this->postInterface->getOnlyFeaturedByCategoryCreated(15, request('limit', 10));

        return response([
            "data" => Theme::partial('templates/post', $data),
            "disable" => $data['posts']->count() == 0
        ], 200);
    }

    public function getDistributionSystem(Request $request, DistributionSystemInterface $distributionSystemInterface, BaseHttpResponse $response)
    {
        Log::info("======== Lấy danh sách chi nhánh theo Tỉnh/Thành phố: {$request->city} =========");
        $condition = [
            "status" => BaseStatusEnum::PUBLISHED
        ];

        if (request('city')) {
            $condition['state_id'] = request('city');
        }

        $distributionSystems = $distributionSystemInterface->advancedGet(
            ['condition' => $condition]
        );

        return $response->setData([
            "data" => $distributionSystems,
            "template" => \Theme::partial('templates.distribution', [
                'data' => $distributionSystems
            ])
        ]);
    }

    public function getShowroomByBrand(BaseHttpResponse $response, ShowroomInterface $showroomInterface, ShowroomBrandInterface $showroomBrandInterface)
    {
        $showroomIDs = $showroomBrandInterface->advancedGet([
            "condition" => [
                "status" => BaseStatusEnum::PUBLISHED,
                "brand_id" => request('brand'),
                "category_id" => request('category'),
            ],
            'select' => ['showroom_id']
        ])->pluck('showroom_id')->toArray() ?? [];

        $condition = [
            "status" => BaseStatusEnum::PUBLISHED,
            ['id', 'IN', $showroomIDs],
            'distribution_system_id' => request('distribution_id')
        ];

        if (blank(request('category')) && blank(request('brand'))) {
            $condition = [
                "status" => BaseStatusEnum::PUBLISHED,
                'distribution_system_id' => request('distribution_id')
            ];
        }

        $data['showrooms'] = $showroomInterface->advancedGet([
            "condition" => $condition,
            'select' => ['*']
        ]);

        return $response
            ->setData([
                "template" => \Theme::partial('templates.showroom', $data)
            ]);
    }

    public function getResultSearch(Request $request, PostInterface $postRepository)
    {
        // if($request->ajax() && $request->has('cate')) {
        //     $data = get_posts_by_category($request->input('cate'), 5);
        //     return view("theme.main::views.components.result-search", compact('data'))->render();
        // }

        //dd('sdf');

        $query = $request->input('keyword');

        if (!$query) {
            return Theme::scope('search')
                ->render();
        }

        $title = __('Search result for: ":query"', compact('query'));

        SeoHelper::setTitle($title)
            ->setDescription($title);

        if($request->category) {
            $slug = SlugHelper::getSlug($request->category, SlugHelper::getPrefix(Category::class));
        }

        $filter['keyword'] = $request->keyword;
        $filter['category'] = $slug->reference_id??null;
        $filter['birthday'] = $request->birthday??null;

        $posts = app(InterfacesPostInterface::class)->getSearchByCategoryAndFilter($filter, 6);

        // Theme::breadcrumb()
        //     ->add(__('Home'), route('public.index'))
        //     ->add($title, route('public.search'));

        $comment = $posts->total() . __('kết quả được tìm thấy') .
            "<strong class='text-uppercase color-pri font20'> $query </strong>";

        return Theme::scope('search', compact(['posts', 'comment']))
            ->render();
    }

    public function getApiSearch(Request $request, PostInterface $postRepository)
    {
        if($request->ajax() && $request->has('filter')) {
            $filter = $request->filter;

            if($filter['category']) {
                $slug = SlugHelper::getSlug($filter['category'], SlugHelper::getPrefix(Category::class));
            }

            // if (!$slug) {
            //     $posts = $postRepository->getSearch($keyword, 0, 6);
            //     return view("theme.main::views.components.result-filter-cate", compact('posts'))->render();
            // }

            $filter['category'] = $slug->reference_id??null;

            $filter['keyword'] = $filter['keyword']??"";

            $filter['birthday'] = $filter['birthday']??null;

            $posts = app(InterfacesPostInterface::class)->getSearchByCategoryAndFilter($filter, 6);

            return view("theme.main::views.components.result-filter-cate", compact('posts'))->render();
        }

        else {
            if ($request->ajax()) {
                $query = $request->input('keyword');
    
                if (!$query) {
                    $posts = [];
                    return view("theme.main::views.components.result-search", compact('posts'))->render();
                }
    
                $posts = $postRepository->getSearch($query, 0, 5);
                return view("theme.main::views.components.result-search", compact('posts'))->render();
            }
        }
    }

    public function getFirstStepCarSelection(BaseHttpResponse $response)
    {
        return $response
            ->setData([
                "template" => \Theme::partial('templates.car-selection.step-first')
            ]);
    }

    public function getMonthsAcceptLoans(Request $request, BankloansInterface $bankloansInterface){
        try {
            $bank = Bank::where('id', $request->bank)->first();
            $data = Bankloans::where('bank_id', $request->bank)->orderBy('months')->get()->unique('months');
            $output = "";
            if(!empty($data)){
                foreach($data as $item){
                    $output.='<div class="item d-flex justify-content-between align-items-center" data-value="'.$item->id.'">
                        <span>'.$item->months.' '.trans("Month").'</span>
                    </div>';
                }
            }
            return response()->json(
                [
                    'month' => $output,
                    'type' => 'success',
                    'bank' => $bank->name
                ]
            );
        } catch (\Throwable $th) {
            Log::error('Có lỗi xảy ra khi lấy danh sách đại lý theo tỉnh thành', [$th->getMessage(), $th->getFile(), $th->getLine()]);
            return response()->json(
                [
                    'type' => 'error',
                    'message' => $th->getMessage(),

                ]
            )->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getPercentLoans(Request $request, BankloansInterface $bankloansInterface){
        try {
            $totalPrice = $request->total;
            $loanHasMonth  =Bankloans::where('id', $request->loan_id)->first();
            $data = Bankloans::where('bank_id',$loanHasMonth->bank_id)->where('months', $loanHasMonth->months)->orderBy('interest_rate')->get();
            $output = "";
            if(!empty($data)){
                foreach($data as $item){
                    $moneyLoan = number_format($totalPrice*$item->percent_loans/100, 0, '.', ',') . 'đ';
                    $output.='<div class="item d-flex justify-content-between align-items-center" data-value="'.$item->percent_loans.'">
                        <span>'.$item->percent_loans.'% - '.$moneyLoan.'</span>
                    </div>';
                }
            }
            $outputInterestRate = '<div class="item d-flex justify-content-between align-items-center" data-value="'.$loanHasMonth->interest_rate.'">
                <span>'.$loanHasMonth->months.' '.trans("Month").' - '.$loanHasMonth->interest_rate.'%</span>
            </div>';
            return response()->json(
                [
                    'percentLoan' => $output,
                    'outputInterestRate' => $outputInterestRate,
                    'type' => 'success',
                    'month' => $loanHasMonth->months,
                    "interestRate" => $loanHasMonth->interest_rate,
                ]
            );
        } catch (\Throwable $th) {
            Log::error('Có lỗi xảy ra khi lấy danh sách đại lý theo tỉnh thành', [$th->getMessage(), $th->getFile(), $th->getLine()]);
            return response()->json(
                [
                    'type' => 'error',
                    'message' => $th->getMessage(),

                ]
            )->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function getShareholder(Request $request, BankloansInterface $bankloansInterface){
        try {
            
            $data['data']  = get_shareholder_by_category_id($request->categoryId);
            
            $image = get_image_url(Shareholdercateogry::where('id', $request->categoryId)->first()->image);
            return response()->json(
                [
                    'shareholders' => Theme::partial('templates/shareholder', $data),
                    'type' => 'success',
                    'image' => $image,
                ]
            );
        } catch (\Throwable $th) {
            Log::error('Có lỗi xảy ra khi lấy danh sách đại lý theo tỉnh thành', [$th->getMessage(), $th->getFile(), $th->getLine()]);
            return response()->json(
                [
                    'type' => 'error',
                    'message' => $th->getMessage(),

                ]
            )->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
