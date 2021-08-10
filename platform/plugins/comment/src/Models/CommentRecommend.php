<?php


namespace Platform\Comment\Models;


use Platform\Base\Models\BaseModel;

class CommentRecommend extends BaseModel
{
    protected $table = 'bb_comment_recommends';

    protected $fillable = [
        'reference_id',
        'reference_type',
        'user_id',
    ];

}
