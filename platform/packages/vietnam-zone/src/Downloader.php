<?php

namespace Kjmtrue\VietnamZone;

use GuzzleHttp\Client;

class Downloader
{
    const DOWNLOAD_URL = 'https://github.com/kjmtrue/vietnam-zone/raw/database/vietnam-zone.xls';

    /**
     * Download database VietNam Zone
     *
     * @return string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function downloadFile()
    {
        $client = new Client([
            'verify' => false
        ]);

        $res = $client->get(self::DOWNLOAD_URL, [
            'save_to' => public_path('storage/vietnam-zone.xls')
        ]);

        return $res->getStatusCode() == 200 ? public_path('storage/vietnam-zone.xls') : null;
    }
}