<?php

namespace App\Services;

class ImageTools extends ImageService
{
   
   public function uploadImage($image, $mainFolder)
   {
      
      
      
      $this->setMainFolder($mainFolder);
      $this->setImage($image);
      $this->setPathUpload();
      $this->setNameImage();
      
      return $this->save();
      
   }
   
   
   public function deleteImage($imagePatch)
   {
      if (file_exists($imagePatch))
      {
         unlink($imagePatch);
      }
   }
   
}