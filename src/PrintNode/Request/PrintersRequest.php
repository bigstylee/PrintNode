<?php

namespace Bigstylee\PrintNode\Request;

use Bigstylee\PrintNode\Response\PrintersResponse;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class PrintersRequest
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class PrintersRequest extends AbstractRequest
{
    /**
     * @return PrintersResponse
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getResponse()
    {
        $response = $this->request->request('GET', sprintf($this->url, 'printers'));

        return new PrintersResponse(
            $response->toArray(), $response->getHeaders()
        );
    }
}