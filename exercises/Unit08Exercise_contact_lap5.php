<?php
// Lukas Presti, IT202-005, Internet Applications, Unit 8 Exercise, lap5@njit.edu
require_once('database.php');

class Contact
{
    public $name;
    public $email;
    public $message;

    function __construct($name, $email, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    function saveContact()
    {
        $db = getDB();
        $query = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";
        $stmt = $db->prepare($query); 

        $stmt->bind_param(          
            "sss",                
            $this->name,           
            $this->email,            
            $this->message       
        );

        $result = $stmt->execute(); 
        $db->close();
        return $result;
    }
}
?>
