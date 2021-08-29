<?php

namespace Theme\Main\Http\Controllers;

use Illuminate\Http\Request;
use Platform\Base\Http\Controllers\BaseController;
use Platform\Base\Http\Responses\BaseHttpResponse;

class AjaxController extends BaseController
{
    public function getNewPosts(Request $request)
    {
        if ($request->ajax()) {
            $data = get_featured_posts_by_category(request('category', -1), 5);
            $output = '';
            if (!empty($data)) {
                foreach ($data as $post) {
                    $postImage = get_object_image($post->image, 'post-related');
                    $output .= '
                        <div class="post-new-item">
                        <div class="post-thumbnail-wrap">
                            <div class="post-thumbnail">
                                <a href="' . $post->url . '"><img loading="lazy" src="' . $postImage . '" alt="{{$post->name}}"></a>
                            </div>
                        </div>
                            <h5 class="title font-mi-bold font20">
                                <a href="' . $post->url . '">{{$post->name}}</a>
                            </h5>
                        </div>
                        ';
                }
            }
            return $output;
        }
    }
}
