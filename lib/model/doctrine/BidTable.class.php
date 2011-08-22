<?php

/**
 * BidTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class BidTable extends Doctrine_Table
{
    public static $STATUS = array(
        "open" => "Open",
        "accepted" => "Bid Accepted",
        "cancelled" => "Cancelled"
    );
    
    /**
     * Returns an instance of this class.
     *
     * @return object BidTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Bid');
    }
}