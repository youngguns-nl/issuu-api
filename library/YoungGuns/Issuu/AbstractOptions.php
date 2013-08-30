<?php

namespace YoungGuns\Issuu;

use YoungGuns\StdLib\PropertyAccessor as BaseAbstractOptions;

/**
 * Description of AbstractOptions
 *
 * @author verweel
 */
class AbstractOptions extends BaseAbstractOptions
{

    /**
     * Application key for the account
     * 
     * @var type
     */
    protected $apiKey;

    protected $signature;

    protected $action;

    protected $format;

    protected $jsonCallback;


    public function __construct($data) {
        foreach($data as $key => $value) {
            $this->$key = $value;
        }
    }


    protected function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }


    protected function setFormat($format)
    {
        $this->format = $format;
    }
}
