<?php

namespace Platform\Kernel\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Assets;

class AssetEditorMiddleware
{

    /**
     * @param Request $request
     * @param Closure $next
     * @return RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        Assets::addScriptsDirectly(config('core.base.general.editor.tinymce.js'))
            ->addScriptsDirectly('vendor/core/core/base/js/editor.js');
        return $next($request);
    }
}
