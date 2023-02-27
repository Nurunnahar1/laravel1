<?php

 //==================2 no ans=====================

 class Person {
    private $name;
    private $email;
    
  
    public function __construct($name, $email ) {
      $this->name = $name;
      $this->email = $email;
      
    }
  
    public function setName() {
      return $this->name;
    }
  
    public function getName($name) {
      $this->name = $name;
    }
  
    public function setEmail() {
      return $this->email;
    }
  
    public function getEmail($email) {
      $this->email = $email;
    }
  
   
  
    public function person_info() {
      echo "My name is: " . $this->name . "\n";
      echo "My email is: " . $this->email . "\n";
      
    }
  }
  
 
  $person_info = new Person("Nurunnahar", "nurunnahar9081@gmail.com" );
  $person_info->person_info();