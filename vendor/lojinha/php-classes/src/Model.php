<?php

namespace src;

class Model {

   private $values = [];
   
   public function __call($name, $arguments)
   {
       
     $method = substr($name, 0, 3);
     $fildName = substr($name, 3, strlen($name));
     
     switch($method){

      case "get":

        return $this->values[$fildName];

      break;

      case "set":

        $this->values[$fildName] = $arguments[0];

      break;  

     }

   }
   public function setData($data = array()){

      foreach($data as $key => $value){
        
       $this->{"set".$key}($value);

      }

   }
   public function getValues($data = array()){

    return $this->values;

   }


}


