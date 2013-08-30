<?php

namespace YoungGuns\Issuu\Document;

use YoungGuns\Issuu\AbstractOptions;
/**
 * Description of ListOptions
 *
 * @author verweel
 */
class ListOptions extends AbstractOptions
{

    /**
     * API action
     * @var string
     */
    protected $action = 'issuu.documents.list';

    /**
     * Comma-separated list document states indicated by a single char:
     *  "A" - Active documents
     *  "F" - Documents that failed during conversion
     *  "P" - Documents that are currently being processed
     *  Leave this field blank to list all documents regardless of state
     *
     * @var string
     */
    protected $documentStates;


    protected $access;

    protected $origins;

    protected $orgDocTypes;

    protected $orgDocName;

    protected $resultOrder;

    protected $startIndex;

    protected $pageSize;

    protected $documentSortBy;

    protected $responseParams;

    

    protected function setPageSize($size)
    {
        $this->pageSize = (int)$size;
    }

    protected function setStartIndex($startIndex){
        $this->startIndex = (int)$startIndex;
    }
    
    
}
