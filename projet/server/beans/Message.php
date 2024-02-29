<?php
class Message implements JsonSerializable{
  private $pk;
  private $date;

  private $message;

  private $fkUser;
  
  public function __construct($pk, $date, $message, $fkUser){
    $this->pk = $pk;
    $this->date = $date;
    $this->message = $message;
    $this->fkUser = $fkUser;
  }
  
  public function getPk(){
    return $this->pk;
  }
  
  public function getDate(){
    return $this->date;
  }
  public function getMessage(){
    return $this->message;
  }
  public function getFkUser(){
    return $this->fkUser;
  }

  public function jsonSerialize() :mixed{
    return [
      'pk' => $this->pk,
      'date' => $this->date,
      'message' => $this->message,
      'fkUser' => $this->fkUser
    ];}

}


?>