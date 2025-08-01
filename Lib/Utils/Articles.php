<?php

namespace Utils;

use DateTime;
use DateTimeZone;
use Predis\Client;

const cachePrefix = 'doclink-article_';
// const apiDomain = 'https://taxcom.ru';
const baseApiUrl = '/data/testdocs/networks';
const apiEndpoints = [
    'articles' => '',
    'Kramp' => '/Kramp',
    'sections' => '/section',
    'tags' => '/tag'
];
$root_path3 = dirname($_SERVER['DOCUMENT_ROOT']);
class Articles
{
    /**
     * @param string $cacheKey
     * @param string $endpoint
     * @return array
     */
    private static function getData(string $cacheKey, string $endpoint): array
    {

        $redis = new Client([
            'scheme' => 'tcp',
            'host' => $_ENV['REDIS_HOST'],
        ]);
        


        // $result = $redis->get($cacheKey);

        // if ($result) {
        //     try {
        //         return json_decode($result, true, 512, JSON_THROW_ON_ERROR);
        //     } catch (\JsonException $e) {
        //         return ["error"=> $e];
        //     }
        // }


        try {
          $path = dirname($_SERVER['DOCUMENT_ROOT']) . baseApiUrl . $endpoint;
          // echo $path;
   
          // $result = readfile($path);
          $result = file_get_contents($path);
          // var_dump($result);
          // die();
          // $redis->setex($cacheKey, 600, $result);
          $result = json_decode($result, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
          return ["error"=> $e];
        }

        return $result;
    }

    public static function getArticle(string $fileName): array
    {

        $articleCacheKey = cachePrefix . $fileName;
        // echo apiEndpoints['Kramp'] . '/' . $fileName . '.json';
        $result = self::getData($articleCacheKey, apiEndpoints['Kramp'] . '/' . $fileName . '.json');
        if (empty($result)) {
            return [];
        }

        return $result;
    }

}
