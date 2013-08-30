<?php

namespace YoungGuns\Issuu\Document;

use YoungGuns\Issuu\AbstractOptions;
use Zend\Validator\Uri as UriValidator;

/**
 * Description of ListOptions
 *
 * @author verweel
 */
class UrlUploadOptions extends AbstractOptions {

    /**
     * Add a document to a user's profile by specifying its location on the web. The document can be automatically added to a folder once it has been converted
     *
     * @var string
     */
    protected $action = 'issuu.document.url_upload';

    /**
     * URL of document to be uploaded. This location must be public meaning no login or password required to access resource
     * 
     * @var string
     */
    protected $slurpUrl;

    /**
     * Title of the publication. If no value is specified the filename of the uploaded document will be used
     *
     * @var string
     */
    protected $title;

    /**
     * Folders to copy the document to when processing is done. Use method issuu.folders.list to find the id of a specific folder
     *
     * @var string
     */
    protected $folderIds;

    /**
     *
     * @param string $url
     */
    protected function setSlurpUrl($url) {
        $validator = new UriValidator;
        if ($validator->isValid($url)) {
            $this->slurpUrl = $url;
        }
    }

    /**
     *
     * @param string $title
     */
    protected function setTitle($title) {
        $this->title = $title;
    }

    /**
     *
     * @param string $folderIds
     */
    protected function setFolderIds($folderIds) {
        $this->folderIds = $folderIds;
    }

}

