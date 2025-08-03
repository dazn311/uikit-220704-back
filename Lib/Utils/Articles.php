<?php

namespace Utils;

use Predis\Client;
 
const cachePrefix = 'uikit-article_';

class Articles
{
    /**
     * @param string $cacheKey
     * @param string $endpoint
     * @return array
     */
    private static function getData(string $cacheKey, string $endpoint): array
    {
      $client = new Client([
            'scheme' => 'tcp',
            'host' => $_ENV['REDIS_HOST']
        ]);

        $result = $client->get($cacheKey);

        if ($result) {
            try {
                return json_decode($result, true, 512, JSON_THROW_ON_ERROR);
            } catch (\JsonException $e) {
                return ["error"=> $e];
            }
        }

        try {
          $path = dirname($_SERVER['DOCUMENT_ROOT']) . $_ENV['BASE_API_URL'] . $endpoint;
   
          $result = file_get_contents($path);
          $result = htmlspecialchars_decode($result);
          $client->setex($cacheKey, 600, $result);
          $result = json_decode($result, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
          return ["error" => $e];
        }

        return $result;
    }

    public static function getArticle(string $ts,string $fileName): array
    {

        $articleCacheKey = cachePrefix . $fileName;

        $path = '/' . $ts . '/' . $fileName;// . '.json';
        $result = self::getData($articleCacheKey, $path);

        if (empty($result)) {
            return [];
        }
        // $result = htmlspecialchars_decode($result);
        return $result;
    }
}
