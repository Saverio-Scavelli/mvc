<?php

echo 'wieder was';

class Users{
    
    
    public function __construct(){
        
    }
    
    
    public function listusers($args)
    {
        include '../app/views/users.php';
    
    }
}
