<?php


namespace alexcrisbrito\culusms\http;


use alexcrisbrito\culusms\interfaces\ResponseInterface;

class Response implements ResponseInterface
{
    private $responsePayload;

    public function __construct($responsePayload)
    {
        $this->responsePayload = $responsePayload;
    }

    /**
     * Returns the raw json
     * response obtained
     *
     * @return mixed
     */
    public function getResponsePayload()
    {
        return $this->responsePayload;
    }

    private function parseResponse() {
        return json_decode($this->responsePayload, true);
    }

    public function getStatus(): int
    {
        $response = $this->parseResponse();
        return $response['status'];
    }

    public function getResponseMessage(): string
    {
        $response = $this->parseResponse();
        return $response['message'];
    }

    public function getData()
    {
        $response = $this->parseResponse();
        return $response['data'];
    }

    public function isSuccess(): bool
    {
        return $this->getStatus() == 200;
    }
}