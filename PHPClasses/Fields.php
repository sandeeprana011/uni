<?php

/**
 * Created by PhpStorm.
 * User: sandeeprana
 * Date: 16/04/16
 * Time: 11:46 PM
 */
class Fields
{
    public $FB_TOKEN_NAME;

    public $FIRST_NAME ;
    public $LAST_NAME ;
    public $ID    ;
    public $EMAIL  ;
    public $PASSWORD ;
    public $REMEMBER_TOKEN;
    public $CREATED_AT ;
    public $UPDATED_AT ;
    public $MIDDLE_NAME ;
    public $LOCATION;
    public $HOMETOWN;
    public $BIRTHDAY ;
    public $GENDER;
    public $ABOUT;
    public $AGE_RANGE ;
    public $RELATIONSHIP_STATUS;
    public $BIO;
    public $NAME;
    public $MIN;

    function _construct()
    {

        $FB_TOKEN_NAME = "fb_access_token";
        $FIRST_NAME = "first_name";
        $LAST_NAME = "last_name";
        $ID = "id";
        $EMAIL = "email";
        $PASSWORD = "password";
        $REMEMBER_TOKEN = "remember_token";
        $CREATED_AT = "created_at";
        $UPDATED_AT = "updated_at";
        $MIDDLE_NAME = "middle_name";
        $LOCATION = "location";
        $HOMETOWN = "hometown";
        $BIRTHDAY = "birthday";
        $GENDER = "gender";
        $ABOUT = "about";
        $AGE_RANGE = "age_range";
        $RELATIONSHIP_STATUS = "relationship_status";
        $BIO = "bio";
        $NAME = "name";
        $MIN = "min";

    }

}