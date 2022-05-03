<?php

namespace App\Services;

use Exception;
use Illuminate\Http\UploadedFile;

class UploadService 
{
    public function uploadFile(UploadedFile $file): string {
            $competedFile = $file->storeAs('news', $file->hashName(), 'public');
            if(!$competedFile) {
                throw new Exception("File wasn't upload");
            }
            return $competedFile;
    }
}
