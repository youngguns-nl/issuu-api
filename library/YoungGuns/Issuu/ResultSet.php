<?php

namespace YoungGuns\Issuu;

/**
 * Description of ResultSet
 *
 * @author verweel
 */
class ResultSet implements \Countable{


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

    public function count() {
        return count($this->items);
    }


    public function getItems()
    {
        return $this->items;
    }
}
