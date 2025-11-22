<?php
declare(strict_types = 1);

namespace Core;

class Request
{
    public readonly array $getParams;
    public readonly array $postParams;
    public readonly array $server;

    public function __construct()
    {
        $this->getParams = $_GET;
        $this->postParams = $_POST;
        $this->server = $_SERVER;
    }

    public function getPath(): string
    {
        $path = $this->server['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');

        if ($position === false) {  return $path;  }

        return substr($path, 0, $position);
    }

    public function getMethod(): string
    {
        return strtolower($this->server['SERVER_METHOD'] ?? 'get');
    }

    public function isPost(): bool
    {
        return $this->getMethod() === 'post';
    }

    public function isGet(): bool
    {
        return $this->getMethod() === 'get';
    }

    public function getBody(): array
    {
        return array_merge($this->getParams, $this->postParams);
    }
}

