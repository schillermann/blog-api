<?php
namespace SimpleApi;

class Endpoint
{
    const ROOT_PATH = '../endpoints';
    const PHP_FILE_EXTENSION = '.php';
    const URI_DELIMITER = '/';
    const TYPE_ID = '@id';
    const TYPE_DATE = '@date';
    const TYPE_STRING = '@string';

    static function getResponse(string $uri, $method = 'GET', string $rootPath = self::ROOT_PATH): array
    {
        $request = self::filterRequest($uri, $method, $rootPath);

        $endpointFunction = include $request->getRouteFilePath();
        return $endpointFunction($request->getParameters());
    }

    static function filterRequest(string $uri, $method = 'GET', string $rootPath = self::ROOT_PATH): Request
    {
        $absoluteRootPath = realpath($rootPath);
        if(!$absoluteRootPath)
            throw new Exception('Base path not found: ' . $rootPath);

        $uriParts = explode(self::URI_DELIMITER, trim($uri, self::URI_DELIMITER));
        $route = '';
        $request = new Request();
        $key = '';

        foreach($uriParts as $resource) {

            if(file_exists($absoluteRootPath . $route . self::URI_DELIMITER . $resource)) {
                $route .= self::URI_DELIMITER . $resource;
                $key = $resource;
            } elseif(file_exists($absoluteRootPath . $route . self::URI_DELIMITER . $resource . self::PHP_FILE_EXTENSION)) {
                $route .= self::URI_DELIMITER . $resource . self::PHP_FILE_EXTENSION;
            } elseif (is_numeric($resource)) {
                $route .= self::URI_DELIMITER . self::TYPE_ID;
                $request->setParameter($key, (int)$resource);
            } elseif (TypeCheck::is_datetime($resource)) {
                $route .= self::URI_DELIMITER . self::TYPE_DATE;
                $request->setParameter($key, new \DateTime($resource));
            } else {
                $route .= self::URI_DELIMITER . self::TYPE_STRING;
                $request->setParameter($key, $resource);
            }

            if(!file_exists($absoluteRootPath . $route)) {
                throw new Exception('Route not found: ' . $route);
            }
        }

        $request->setRoute($route);

        $fileToEndpoint = $absoluteRootPath . $route . self::URI_DELIMITER . strtolower($method) . self::PHP_FILE_EXTENSION;
        $absoluteFileToEndpoint = realpath($fileToEndpoint);

        if(!$absoluteFileToEndpoint)
            throw new Exception('File not found: ' . $fileToEndpoint);

        $request->setRouteFilePath($absoluteFileToEndpoint);

        return $request;
    }
}