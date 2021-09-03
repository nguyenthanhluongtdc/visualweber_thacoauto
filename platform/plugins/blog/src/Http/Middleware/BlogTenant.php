<?php
namespace Platform\Blog\Http\Middleware;

use Closure;
use Platform\Base\Models\BaseModel;
use Platform\Blog\Models\Post;

class BlogTenant{
    public function handle($request, Closure $next)
    {
         Post::addGlobalScope(new \Platform\Blog\Scopes\BlogTenantScope);
        return $next($request);
    }
}