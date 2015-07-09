<?php
/**
 * Created by PhpStorm.
 * User: aabukhalil
 * Date: 7/8/15
 * Time: 5:11 PM
 */
class UserController
{
    public static function logIn($username, $password){
        // TODO: return id or null
    }
    public static function logOut($id){
        // TODO: return void
    }
    public static function addUser($username, $password){
        // TODO: return bool of success
    }
    public static function isUsernameExists($username){
        // TODO: return bool
    }
    public static function isOnline($usr_id){
        // TODO: return bool
    }
    public static function getUserCitiesIds(User $user)
    {
        // TODO: return array of cities that user owns
    }
    public static function getAllUsersIds()
    {
        // TODO:
    }
}