<?php 



class User
{
  protected $storage;
 
  public function __construct($storage)
  {
    $this->storage = $storage;
  }
 
  public function setLanguage($language)
  {
    $this->storage->set('language', $language);
  }
 
  public function getLanguage()
  {
    return $this->storage->get('language');
  }
 
  public function setSessionStorage($storage)
    {
      $this->storage = $storage;
    }
  // ...
}