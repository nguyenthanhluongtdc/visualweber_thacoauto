<?php

namespace Platform\WordpressImporter\Http\Controllers;

use Assets;
use Platform\Base\Http\Controllers\BaseController;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\WordpressImporter\Http\Requests\WordpressImporterRequest;
use Platform\WordpressImporter\WordpressImporter;

class WordpressImporterController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        Assets::addScriptsDirectly('vendor/core/plugins/wordpress-importer/js/wordpress-importer.js')
            ->addStylesDirectly('vendor/core/plugins/wordpress-importer/css/wordpress-importer.css');

        page_title()->setTitle(trans('plugins/wordpress-importer::wordpress-importer.name'));

        return view('plugins/wordpress-importer::import');
    }

    /**
     * @param WordpressImporterRequest $request
     * @param BaseHttpResponse $response
     * @param WordpressImporter $wordpressImporter
     * @return BaseHttpResponse
     */
    public function import(
        WordpressImporterRequest $request,
        BaseHttpResponse $response,
        WordpressImporter $wordpressImporter
    )
    {
        $validate = $wordpressImporter->verifyRequest($request);

        if ($validate['error']) {
            return $response
                ->setError()
                ->setMessage($validate['message']);
        }

        $result = $wordpressImporter->import();

        return $response
            ->setMessage(trans('plugins/wordpress-importer::wordpress-importer.import_success', $result));
    }
}
