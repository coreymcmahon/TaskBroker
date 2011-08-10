<?php

/**
 * BaseUserProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property string $suburb
 * @property string $postcode
 * @property string $phone
 * @property string $about
 * @property string $twitter
 * @property sfGuardUser $User
 * 
 * @method integer     getUserId()   Returns the current record's "user_id" value
 * @method string      getSuburb()   Returns the current record's "suburb" value
 * @method string      getPostcode() Returns the current record's "postcode" value
 * @method string      getPhone()    Returns the current record's "phone" value
 * @method string      getAbout()    Returns the current record's "about" value
 * @method string      getTwitter()  Returns the current record's "twitter" value
 * @method sfGuardUser getUser()     Returns the current record's "User" value
 * @method UserProfile setUserId()   Sets the current record's "user_id" value
 * @method UserProfile setSuburb()   Sets the current record's "suburb" value
 * @method UserProfile setPostcode() Sets the current record's "postcode" value
 * @method UserProfile setPhone()    Sets the current record's "phone" value
 * @method UserProfile setAbout()    Sets the current record's "about" value
 * @method UserProfile setTwitter()  Sets the current record's "twitter" value
 * @method UserProfile setUser()     Sets the current record's "User" value
 * 
 * @package    taskbroker
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUserProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user_profile');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('suburb', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('postcode', 'string', 10, array(
             'type' => 'string',
             'length' => 10,
             ));
        $this->hasColumn('phone', 'string', 31, array(
             'type' => 'string',
             'length' => 31,
             ));
        $this->hasColumn('about', 'string', 4000, array(
             'type' => 'string',
             'length' => 4000,
             ));
        $this->hasColumn('twitter', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}