<?php

/**
 * BaseFeedback
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $receiver_id
 * @property integer $provider_id
 * @property integer $score
 * @property string $message
 * @property integer $task_id
 * @property sfGuardUser $Receiver
 * @property sfGuardUser $Provider
 * @property Task $Task
 * 
 * @method integer     getReceiverId()  Returns the current record's "receiver_id" value
 * @method integer     getProviderId()  Returns the current record's "provider_id" value
 * @method integer     getScore()       Returns the current record's "score" value
 * @method string      getMessage()     Returns the current record's "message" value
 * @method integer     getTaskId()      Returns the current record's "task_id" value
 * @method sfGuardUser getReceiver()    Returns the current record's "Receiver" value
 * @method sfGuardUser getProvider()    Returns the current record's "Provider" value
 * @method Task        getTask()        Returns the current record's "Task" value
 * @method Feedback    setReceiverId()  Sets the current record's "receiver_id" value
 * @method Feedback    setProviderId()  Sets the current record's "provider_id" value
 * @method Feedback    setScore()       Sets the current record's "score" value
 * @method Feedback    setMessage()     Sets the current record's "message" value
 * @method Feedback    setTaskId()      Sets the current record's "task_id" value
 * @method Feedback    setReceiver()    Sets the current record's "Receiver" value
 * @method Feedback    setProvider()    Sets the current record's "Provider" value
 * @method Feedback    setTask()        Sets the current record's "Task" value
 * 
 * @package    taskbroker
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFeedback extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('feedback');
        $this->hasColumn('receiver_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('provider_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('score', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('message', 'string', 511, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 511,
             ));
        $this->hasColumn('task_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as Receiver', array(
             'local' => 'receiver_id',
             'foreign' => 'id'));

        $this->hasOne('sfGuardUser as Provider', array(
             'local' => 'provider_id',
             'foreign' => 'id'));

        $this->hasOne('Task', array(
             'local' => 'task_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}