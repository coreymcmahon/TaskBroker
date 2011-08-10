<?php

/**
 * BaseTask
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $creator_id
 * @property integer $city
 * @property string $title
 * @property string $description
 * @property datetime $completion_date
 * @property integer $reserve_price
 * @property integer $payment
 * @property string $method
 * @property sfGuardUser $Creator
 * 
 * @method integer     getCreatorId()       Returns the current record's "creator_id" value
 * @method integer     getCity()            Returns the current record's "city" value
 * @method string      getTitle()           Returns the current record's "title" value
 * @method string      getDescription()     Returns the current record's "description" value
 * @method datetime    getCompletionDate()  Returns the current record's "completion_date" value
 * @method integer     getReservePrice()    Returns the current record's "reserve_price" value
 * @method integer     getPayment()         Returns the current record's "payment" value
 * @method string      getMethod()          Returns the current record's "method" value
 * @method sfGuardUser getCreator()         Returns the current record's "Creator" value
 * @method Task        setCreatorId()       Sets the current record's "creator_id" value
 * @method Task        setCity()            Sets the current record's "city" value
 * @method Task        setTitle()           Sets the current record's "title" value
 * @method Task        setDescription()     Sets the current record's "description" value
 * @method Task        setCompletionDate()  Sets the current record's "completion_date" value
 * @method Task        setReservePrice()    Sets the current record's "reserve_price" value
 * @method Task        setPayment()         Sets the current record's "payment" value
 * @method Task        setMethod()          Sets the current record's "method" value
 * @method Task        setCreator()         Sets the current record's "Creator" value
 * 
 * @package    taskbroker
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTask extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('task');
        $this->hasColumn('creator_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('city', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', 4000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 4000,
             ));
        $this->hasColumn('completion_date', 'datetime', null, array(
             'type' => 'datetime',
             ));
        $this->hasColumn('reserve_price', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('payment', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('method', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as Creator', array(
             'local' => 'creator_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}