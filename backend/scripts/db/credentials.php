<?php
namespace App;
abstract class credentials{
    protected $host = "localhost";
    private $user = "campus";
    private $password = "campus2023";
    protected $dbname = "campuslands";

    public function __get($name){
        return $this->{$name};
    }
}

?>