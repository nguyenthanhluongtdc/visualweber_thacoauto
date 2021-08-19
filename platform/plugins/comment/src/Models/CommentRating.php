<?php


namespace Platform\Comment\Models;


use Platform\Base\Models\BaseModel;

class CommentRating extends BaseModel
{
    protected $table = 'bb_comment_ratings';

    protected $fillable = [
        'reference_id',
        'reference_type',
        'rating',
        'user_id',
    ];

}
