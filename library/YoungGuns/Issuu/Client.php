<?php

namespace YoungGuns\Issuu;

use Zend\Http\Client as HttpClient;
use Zend\Http\Request as HttpRequest;

/**
 * Description of Client
 *
 * @author verweel
 */
class Client {

    const API_URL = 'http://api.issuu.com/1_0';
    const UPLOAD_URL = 'http://upload.issuu.com/1_0';

    /**
     *
     * @var HttpClient
     */
    protected $httpClient;

    /**
     *
     * @var string
     */
    protected $apiKey;

    /**
     *
     * @var string
     */
    protected $apiSecret;

    public function __construct($apiKey, $apiSecret) {
        $this->httpClient = new HttpClient;
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
    }

    public function get(AbstractOptions $options) {
        $httpClient = $this->httpClient
                ->setParameterGet($this->buildQuery($options));

        return $this->doCall($httpClient, HttpRequest::METHOD_GET);
    }

    public function post(AbstractOptions $options) {
        $httpClient = $this->httpClient
                ->setParameterPost($this->buildQuery($options));

        return $this->doCall($httpClient, HttpRequest::METHOD_POST);
    }

    protected function doCall(HttpClient $httpClient, $method = HttpRequest::METHOD_GET) {
        $response = $httpClient
                ->setUri(self::API_URL)
                ->setMethod($method)
                ->send();

        return $response->isSuccess() ? json_decode($response->getBody(), true) : false;
    }


    protected function buildQuery(AbstractOptions $options) {
        $options->apiKey = $this->apiKey;
        $options->format = 'json';
        return array_filter(array_merge($options->toArray(), array('signature' => $this->buildSignature($options))));
    }

    /**
     * @see http://developers.issuu.com/api/signingrequests.html
     *
     * The steps involved in signing a request is as follows:
     *  - Sort request parameters alphabetically (e.g. foo=1, bar=2, baz=3 sorts to bar=2, baz=3, foo=1)
     *  - Concatenate in order your API secret key and request name-value pairs (e.g. SECRETbar2baz3foo1)
     *  - Calculate the signature as the MD5 hash of this string
     *  - Include the signature parameter in the request encoded as lowercase HEX
     *  - (e.g. signature=7431d31140cf412ab5caa73586d6324a)
     *
     * @param array $params
     * @return string
     */
    protected function buildSignature(AbstractOptions $options) {
        $params = $options->toArray();
        ksort($params);
        $signature = $this->apiSecret;

        array_walk($params, function($value, $key) use (&$signature) {
                    if (null !== $value) {
                        $signature .= $key . $value;
                    }
                });

        return strtolower(md5($signature));
    }

}
