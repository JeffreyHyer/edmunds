<?php

namespace Edmunds\Api;

use GuzzleHttp\Client;

abstract class AbstractApi
{
    /**
     * [$client description]
     *
     * @var GuzzleHttp\Client
     */
    protected $edmunds;

    /**
     * [__construct description]
     *
     * @param \Edmunds\Edmunds $edmunds [description]
     */
    public function __construct(\Edmunds\Edmunds $edmunds)
    {
        $this->edmunds = $edmunds;
    }

    /**
     * [get description]
     *
     * @param  [type] $path     [description]
     * @param  [type] $queryStr [description]
     *
     * @return [type]           [description]
     */
    public function get($path, $queryStr = [])
    {
        try {
            $response = $this->edmunds->client->request(
                'GET',
                $this->edmunds->_buildUrl("", $path, $queryStr),
                [
                    'headers' => [
                        'Accept' => 'application/json'
                    ]
                ]
            );

            return $this->_respond($response);
        } catch (\GuzzleHttp\Exception\TransferException $e) {
            if ($e->hasResponse()) {
                return $this->_respond($e->getResponse());
            } else {
                throw $e;
            }
        }
    }

    /**
     * [_respond description]
     *
     * @param  Psr\Http\Message\ResponseInterface $response [description]
     *
     * @return [type]                                       [description]
     */
    protected function _respond(\Psr\Http\Message\ResponseInterface $response)
    {
        $retval = (object)[
            'code'      => $response->getStatusCode(),
            'reason'    => $response->getReasonPhrase(),
            'response'  => json_decode($response->getBody()->getContents())
        ];

        return $retval;
    }
}
