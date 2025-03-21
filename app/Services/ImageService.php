<?php

namespace App\Services;

class ImageService
{
   
   protected $image;
   protected $mainFolder;
   protected $pathUpload;
   protected $nameImage;
   
   
   public function setImage($image)
   {
      return $this->image = $image;
   }
   public function setMainFolder($mainFolder)
   {
      $this->mainFolder = $mainFolder;
   }
  
   
   public function createPathUpload()
   {
      $pathUpload = $this->mainFolder . '/' . date('Y')
         . '/' . date('m') . '/'. date('d');
      
      return $pathUpload;
   }
   
   public function setPathUpload()
   {
       $this->pathUpload = $this->createPathUpload();
   }
   
   public function setNameImage()
   {
      $this->nameImage = rand() . '.' . $this->image->extension();
   }
   
   public function getNameImage()
   {
      return $this->nameImage;
   }
   
   public function getPathUpload()
   {
      return $this->pathUpload;
      
   }
   
   
   public function save()
   {
      return $this->image->storeAs($this->pathUpload, $this->nameImage,'public');
   }
   
}







