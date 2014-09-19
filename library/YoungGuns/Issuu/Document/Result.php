<?php

namespace YoungGuns\Issuu\Document;

/**
 * Description of Result
 *
 * @author verweel
 */
class Result extends \YoungGuns\StdLib\PropertyAccessor {

    /**
     * Owner of document
     *
     * @var string
     */
    protected $username;

    /**
     * Name of document. Combined with username this defines documents location on Issuu: http://issuu.com/<username>/docs/<name>
     * 
     * @var string
     */
    protected $name;

    /**
     * Unique identifier of the document
     * 
     * @var string
     */
    protected $documentId;

    /**
     * Title of the document
     * 
     * @var string
     */
    protected $title;

    /**
     * Visibility of document
     *
     * @var string public|private
     */
    protected $access;

    /**
     * The state of the document
     *
     * "A" - Active document
     * "F" - Document failed during conversion
     * "P" - Document currently being processed
     * 
     * @var string
     */
    protected $state;

    /**
     * If document has failed conversion this parameter will give more information about the reason.
     * @see http://developers.issuu.com/api/conversionerrorcodes.html
     * 
     * @var string
     */
    protected $errorCode;

    /**
     * Category to which the content belongs
     * 
     * @var string
     */
    protected $category;

    /**
     * Physical format of publications
     *
     * @var string pdf|odt|doc|wpd|sxw|sxi|rtf|odp|ppt
     */
    protected $type;

    /**
     * Format of original file
     *
     * @var string
     */
    protected $orgDocType;

    /**
     * The original filename of the uploaded document
     * 
     * @var string
     */
    protected $orgDocName;

    /**
     * The source of the document
     *
     * @var string apiupload|apislurp|singleupload|multiupload|singleslurp|multislurp|autoslurp
     */
    protected $origin;

    /**
     * Language Code for the document
     * @see http://developers.issuu.com/api/languagecodes.html
     * 
     * @var string
     */
    protected $language;

    /**
     * The number of pages in the document
     * 
     * @var integer
     */
    protected $pageCount;

    /**
     * Timestamp for when this document was uploaded
     *
     * @var DateTime
     */
    protected $uploadTimestamp;

    /**
     * Timestamp for when this document was published
     * 
     * @var DateTime
     */
    protected $publishDate;

    /**
     * 
     *
     * @var boolean
     */
    protected $preview;

    /**
     * 
     *
     * @var boolean
     */
    protected $downloadable;

    /**
     * 
     *
     * @var string
     */
    protected $pro;

    /**
     * 
     *
     * @var integer
     */
    protected $rating;

    /**
     * 
     *
     * @var boolean
     */
    protected $ratingsAllowed;

    /**
     * 
     *
     * @var string
     */
    protected $ratingDist;

    /**
     * 
     *
     * @var integer
     */
    protected $likes;

    /**
     *
     *
     * @var boolean
     */
    protected $commentsAllowed;

    /**
     *
     * @var string
     */
    protected $dcla;

    /**
     *
     * @var integer
     */
    protected $ep;

    /**
     *
     *
     * @var DateTime
     */
    protected $publicationCreationTime;

    /**
     *
     * @var DateTime
     */
    protected $publicOnIssuuTime;

    /**
     * Description of the content
     * 
     * @var string
     */
    protected $description;

    /**
     * Keywords describing the document
     * 
     * @var array
     */
    protected $tags;

    /**
     * Properties of the original file which could have affected the quality of the finished document.
     * @see http://developers.issuu.com/api/conversionwarningcodes.html
     * 
     * @var array
     */
    protected $warnings;

    /**
     * The folders containing this document
     * 
     * @var array
     */
    protected $folders;


    /**
     *
     * @var integer
     */
    protected $coverWidth;
    
    /**
     * Owner of document
     *
     * @var string
     */
    protected $created;

    protected $showDetectedLinks;

    protected $revisionId;


    /**
     *
     * @var integer
     */
    protected $coverHeight;

    protected function setUploadTimestamp($timestamp) {
        $this->uploadTimestamp = new \DateTime($timestamp);
        return $this;
    }

    protected function setPublishDate($timestamp) {
        $this->publishDate = new \DateTime($timestamp);
        return $this;
    }

    protected function setPublicationCreationTime($timestamp) {
        $this->publicationCreationTime = new \DateTime($timestamp);
        return $this;
    }

    protected function setPublicOnIssuuTime($timestamp) {
        $this->publicOnIssuuTime = new \DateTime($timestamp);
        return $this;
    }

}
