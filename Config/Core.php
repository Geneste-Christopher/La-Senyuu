<?php 

class Core {

    static $bdd;

    static function getDatabase(){

        if (!self::$bdd){

            // En local 
            return new Database("root", "", "akashi_senyuu");
        }
        return self::$bdd;
    }
}