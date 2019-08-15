<?php
namespace FuncApi;

class Request
{
    protected $route = '';
    protected $routeFilePath = '';
    protected $parameters = [];

    function getRoute(): string
    {
        return $this->route;
    }

    function setRoute(string $route): bool
    {
        if(!empty($this->route))
            return false;

        $this->route = $route;
        return true;
    }

    function getRouteFilePath(): string
    {
        return $this->routeFilePath;
    }

    function setRouteFilePath(string $routeFilePath): bool
    {
        if(!empty($this->routeFilePath))
            return false;

        $this->routeFilePath = $routeFilePath;
        return true;
    }

    function getParameter($key)
    {
        return $this->parameters[$key];
    }

    function getParameters(): array
    {
        return $this->parameters;
    }

    function setParameter($key, $value): bool
    {
        if(isset($this->parameters[$key]))
            return false;

        $this->parameters[$key] = $value;
        return true;
    }
}