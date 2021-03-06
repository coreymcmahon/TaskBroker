<?php

/**
 * sfGuardUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    taskbroker
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class sfGuardUser extends PluginsfGuardUser
{
    public function isUserRunner() {
        $profile = Doctrine_Core::getTable("UserProfile")->findBy("user_id",$this->getId());
        $profile = $profile[0];
        $status = $profile->getStatus();

        sfContext::getInstance()->getLogger()->log("userid = " . $this->getId(), sfLogger::DEBUG);
        sfContext::getInstance()->getLogger()->log("status = " . $status, sfLogger::DEBUG);
        
        return ($status == UserProfileTable::$STATUSES["RUNNER"]) || ($status == UserProfileTable::$STATUSES["POSTER-RUNNER"]);
    }
    
}
