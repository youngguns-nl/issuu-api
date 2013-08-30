<?php

namespace YoungGuns\Issuu;

/**
 * Description of ResultSet
 *
 * @author verweel
 */
class ResultSet {


    protected $startIndex;

    protected $pageSize;

    protected $hasMore;
    
    protected $items;


    public function __construct($startIndex, $pageSize, $hasMore) {
        $this->startIndex = $startIndex;
        $this->pageSize = $pageSize;
        $this->hasMore = $hasMore;
    }

    public function addResult($result)
    {
        $this->items[] = $result;
    }
}
