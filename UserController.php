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
        $user = User::getUser($username, $password);
        if($user !== null)
        {
            $_SESSION['user'] =serialize($user);
        }
    }
    public static function logOut($id){
        unset($_SESSION['user']);
    }
    public static function addUser($username, $password){
        User::createUser($username, $password);
    }
    public static function isUsernameExists($username){
        return User::isUserNameExists($username);
    }
    public static function isOnline($usr_id){
        return User::getUserById($usr_id)->getIsOnline();
    }
    public static function getUserCitiesIds($usr_id)
    {
        return User::getUserById($usr_id)->getCitiesIds();
    }
    public static function getAllUsersIds()
    {
        return User::getAllUsersIds();
    }
}