<?php

namespace YoungGuns\Issuu\Document;

use YoungGuns\Issuu\AbstractOptions;
use Zend\Validator\Uri as UriValidator;

/**
 * Description of ListOptions
 *
 * @author verweel
 */
class DeleteOptions extends AbstractOptions {

    /**
     * Add a document to a user's profile by specifying its location on the web. The document can be automatically added to a folder once it has been converted
     *
     * @var string
     */
    protected $action = 'issuu.document.delete';

    /**
     * URL of document to be uploaded. This location must be public meaning no login or password required to access resource
     * 
     * @var string
     */
    protected $name;


    /**
     *
     * @param string $url
     */
    protected function setName($name)
    {
        $this->name = $name;
    }

}

