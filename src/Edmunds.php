<?php

namespace Edmunds;

use GuzzleHttp\Client;

class Edmunds
{

    /**
     * The Guzzle instance used for all requests to the Edmunds API
     *
     * @var \GuzzleHttp\Client
     */
    public $client;

    /**
     * The Edmunds API key used to authorize requests
     *
     * @var [type]
     */
    public $apiKey;

    /**
     * The specific API being used
     *
     * @var [type]
     */
    public $api;

    /**
     * The default configuration options
     *
     * @var array
     */
    public $options = [
        'base_uri'  => 'https://api.edmunds.com/api',
        'version'   => 'v2',
        'format'    => 'json'
    ];

    /**
     * Edmunds\Edmunds constructor
     *
     * @param string    $apiKey         Your application's API Key
     * @param array     $options        Array of options to override defaults
     */
    public function __construct($apiKey, $options = [])
    {
        if (is_null($apiKey)) {
            throw new \Exception("API Key must be provided");
        }

        $this->apiKey = $apiKey;

        $this->options = array_merge($options, $this->options);

        $this->client = new Client();
    }

    /**
     * [_buildUrl description]
     *
     * @param  [type] $domain       [description]
     * @param  string $path         [description]
     * @param  [type] $queryStrings [description]
     *
     * @return [type]               [description]
     */
    public function _buildUrl($domain, $path = "", $queryStrings = [])
    {
        $queryString = "?api_key={$this->apiKey}&fmt={$this->options['format']}";
        foreach ($queryStrings as $key => $value) {
            if (is_array($value)) {
                continue;
            }

            $queryString .= "&{$key}={$value}";
        }

        if ($domain == "") {
            $domain = $this->options['base_uri'];
        }

        $path = trim($path, "/");

        return "{$domain}/{$this->api}/{$this->options['version']}/{$path}{$queryString}";
    }

    protected function api($name)
    {
        switch ($name) {
            case 'vehicle':
            case 'vehicles':
                $api = new Api\Vehicle($this);
                break;

            default:
                return new \Exception("Invalid API ($name)");
        }

        return $api;
    }

    /**
     * [__call description]
     *
     * @param  [type] $method [description]
     * @param  [type] $args   [description]
     *
     * @return [type]         [description]
     *
     * @todo   $args doesn't do anything right now. Is it needed?
     */
    public function __call($method, $args)
    {
        return $this->api($method);
    }
}
