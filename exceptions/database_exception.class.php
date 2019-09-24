<?php
class DatabaseException extends Exception{
    public function __construct(){
        parent::__construct("An error has occurred with the database");
    }
}