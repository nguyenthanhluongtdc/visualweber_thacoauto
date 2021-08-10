<?php

namespace Platform\Comment\Repositories\Caches;

use Platform\Support\Repositories\Caches\CacheAbstractDecorator;
use Platform\Comment\Repositories\Interfaces\CommentUserInterface;

class CommentUserCacheDecorator extends CacheAbstractDecorator implements CommentUserInterface
{

}
