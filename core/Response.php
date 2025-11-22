<?php
declare(strict_types = 1);

namespace Core;

class Response
{
    private string $content = '';
    private int $statusCode = 200;
    private array $headers = [];

    public function setContent(string $content): void
    {
        $this->content = $content;
    }
    public function setStatusCode(int $code): void
    {
        $this->statusCode = $code;
    }

    public function addHeader(string $name, string $value): void
    {
        $this->headers[$name] = $value;
    }

    public function send(): void
    {
        http_response_code($this->statusCode);

        foreach ($this->headers as $name => $value) {
            header("$name: $value");
        }

        echo $this->content;
    }
}