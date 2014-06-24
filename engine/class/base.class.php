<?php
class Base{
    
    const DATE_TIME_FORMAT = 'Y-m-d H:i:s';
    
    protected $limit = 5;    
    
    protected function timePostSQL($timestamp, $field_name) {
        $subquery = "";
        if ($timestamp > 0){
            $date = date(self::DATE_TIME_FORMAT, $timestamp);
            $subquery = " AND $field_name < '$date'";
        } 
        return $subquery;
    }
    
    protected function getLimit() {
        if (defined('RECORDS_LIMIT') && RECORDS_LIMIT > 0){
            $this->limit = RECORDS_LIMIT;
        } 
        return $this->limit;
    }    
    
}


