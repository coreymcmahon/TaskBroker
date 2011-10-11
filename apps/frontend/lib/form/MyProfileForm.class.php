<?php

class MyProfileForm extends BaseForm {
    public function configure() {
        $this->setWidgets(array(
            'username' => new sfWidgetFormInputText(array(),array("disabled" => 'disabled')),
            'email' => new sfWidgetFormInputText(),
            'twitter' => new sfWidgetFormInputText(),
            'firstname' => new sfWidgetFormInputText(),
            'surname' => new sfWidgetFormInputText(),
            'phone' => new sfWidgetFormInputText(),
            'suburb' => new sfWidgetFormInputText(),
            'postcode' => new sfWidgetFormInputText(),
            'about' => new sfWidgetFormTextarea()
        ));
        $this->widgetSchema->setNameFormat('profile[%s]');

        $this->setValidators(array(
            'twitter' => new sfValidatorString(array("required" => false)),
            'email' => new sfValidatorEmail(),
            'firstname' => new sfValidatorString(),
            'surname' => new sfValidatorString(),
            'phone' => new sfValidatorString(array("required" => false)),
            'suburb' => new sfValidatorString(array("required" => false)),
            'postcode' => new sfValidatorString(array("required" => false)),
            'about' => new sfValidatorString(array("required" => false))
        ));
    }

    public function setProfile($user,$user_profile) {
        $this->setDefaults(array(
            'username' => $user->getUsername(),
            'email' => $user->getEmailAddress(),
            'twitter' => $user_profile->getTwitter(),
            'firstname' => $user->getFirstName(),
            'surname' => $user->getLastName(),
            'phone' => $user_profile->getPhone(),
            'suburb' => $user_profile->getSuburb(),
            'postcode' => $user_profile->getPostcode(),
            'about' => $user_profile->getAbout()
        ));
    }
}
