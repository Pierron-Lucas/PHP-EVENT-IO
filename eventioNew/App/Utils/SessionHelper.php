<?php

// Utils/SessionHelper.php

class SessionHelper {

    public static function GetIdUser() {
        if( isset($_SESSION['idUser']) ) {
            return unserialize($_SESSION['idUser']);
        }
        return null;
    }
    
    public static function SetIdUser($idUser) {
        $_SESSION['idUser'] = serialize($idUser);
    }


    public static function GetUser() {
        if( isset($_SESSION['username']) ) {
            return unserialize($_SESSION['username']);
        }
        return null;
    }
    
    public static function SetUser($username) {
        $_SESSION['username'] = serialize($username);
    }

    public static function GetRole() {
        if( isset($_SESSION['role']) ) {
            return unserialize($_SESSION['role']);
        }
        return null;
    }
    
    public static function SetRole($role) {
        $_SESSION['role'] = serialize($role);
    }

    public static function GetPointEvent() {
        if( isset($_SESSION['points']) ) {
            return unserialize($_SESSION['points']);
        }
        return null;
    }
    
    public static function SetPointEvent($points) {
        $_SESSION['points'] = serialize($points);
    }

    public static function UnsetUser() {
        session_destroy();
    }
}