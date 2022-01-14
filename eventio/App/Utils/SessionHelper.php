<?php

// Utils/SessionHelper.php

class SessionHelper {

    public static function GetUser() {
        if( isset($_SESSION['user']) ) {
            return unserialize($_SESSION['user']);
        }
        return null;
    }

    public static function SetUser(UserModel $user) {
        $_SESSION['user'] = serialize($user);
    }

    public static function UnsetUser() {
        session_destroy();
    }
}