<?php namespace Dyentite\Etsy\API;

use GuzzleHttp\Exception\ClientException;
use \GuzzleHttp\HandlerStack;
use \GuzzleHttp\Subscriber\Oauth\Oauth1;
use Dyentite\Exceptions\NoEndpointException;


/**
 * Class API
 * @package Dyentite\Etsy\API
 */
class API
{
    /**
     * Base API URL
     * @var string
     */
    private $base_url = "https://openapi.etsy.com/v2/";
    private $consumer_key;
    private $consumer_secret;
    private $client;

    /**
     * Client constructor.
     */
    public function __construct()
    {
        $this->consumer_key = config('etsy.ETSY_CONSUMER_KEY');
        $this->consumer_secret = config('etsy.ETSY_CONSUMER_SECRET');

        #$this->setStack(); @todo implement oauth token for additional features

        $this->setClient();

    }

    /**
     * Set client Object
     */
    private function setClient()
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => $this->base_url
        ]);
    }

    /**
     * Set Stack for oAuth Authentication
     */
    private function setStack()
    {
        $stack = HandlerStack::create();

        $middleware = new Oauth1([
            'consumer_key' => $this->consumer_key,
            'consumer_secret' => $this->consumer_secret,
        ]);

        $stack->push($middleware);
    }


    /**
     * Make Request to Etsy API
     * @param string $endpoint
     * @param array $query
     * @return
     * @throws NoEndpointException
     */
    public function request($endpoint = '', array $query = [])
    {
        if (empty($endpoint)) {
            throw new NoEndpointException;
        }

        return $this->client->request('GET', $endpoint, ['query' => array_merge(['api_key' => $this->consumer_key], $query)]);
    }


}