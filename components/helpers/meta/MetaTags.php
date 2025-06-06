<?php
namespace frontend\components\helpers\meta;

use GuzzleHttp\Client;
use DiDom\Document;

class MetaTags
{

    public static function httpGet($url)
    {
        try {
            $client = new Client();
            $response = $client->request('GET', $url);
            $html = $response->getBody()->getContents();

            $document = new Document($html);

            $metaTags = [];
            $metaElements = $document->find('meta[property^="og:"]');
            foreach ($metaElements as $meta) {
                $property = $meta->attr('property');
                $content = $meta->attr('content');
                $metaTags[$property] = $content;
            }
            $appleTouchIcon = $document->first('link[rel="apple-touch-icon"]');
            if ($appleTouchIcon) {
                $iconHref = $appleTouchIcon->attr('href');
                if (strpos($iconHref, '/') === 0) {
                    $iconHref = rtrim($url, '/') . $iconHref;
                }
                $metaTags['apple-touch-icon'] = $iconHref;
            }
            return $metaTags;

        } catch (\Exception $e) {
            $data = [
                'status' => 'error', 
                'error' => $e->getMessage()
            ];
        }
        return $data;
    }

    public static function getPreview($url)
    {
        return self::httpGet($url);
    }

    
}