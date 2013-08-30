<?php

namespace YoungGuns\Issuu;

/**
 * Description of FailureResult
 *
 * @author JustInVTime (justin@youngguns.nl)
 */
class FailureResult {


    /**
     * Value used as errorcode
     * @var string
     */
    protected $code;


    /**
     * Value used as errormessage
     * @var string
     */
    protected $message;


    public function __construct($message, $code) {
        $this->message = $message;
        $this->code = $code;
    }


    /**
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
}
