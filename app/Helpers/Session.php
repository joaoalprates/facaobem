<?php

namespace FacaOBem\Helpers;

class Session {

    static function init(){
        session_start();
    }

    static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    static function get($key){
        return $_SESSION[$key];
    }

    static function destroy(){
        session_destroy();
    }

    static function getAll(){
        return $_SESSION;
    }
}

Session::init();
