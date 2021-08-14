<?php

namespace Platform\Kernel\Repositories\Caches;

use Platform\Blog\Repositories\Caches\TagCacheDecorator as BlogTagCacheDecorator;

class TagCacheDecorator extends BlogTagCacheDecorator
{
    public function getAllTags($active = true)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
