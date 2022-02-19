<?php

namespace App\Triats\General;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait MediaTrait
{
    /** 
     * upload file to Storage
     * 
     * @param $file , $path , $name is null 
     * 
     * return file name
     */
    public function uploads($file, $path, $name = null): string
    {
        $fileName = uniqid() . '-' . str_replace(' ', '-', $name) . '.' . $file->extension();
        Storage::disk('public')->put($path . $fileName, File::get($file));
        return $fileName;
    }
    /** 
     * upload file with update to Storage
     * 
     * @param $file , $path , $filename
     * 
     * return file name
     */
    public function updateUpload($file, $fileName, $path)
    {
        Storage::disk('public')->put($path . $fileName, File::get($file));
        return $fileName;
    }
    /** 
     * delete file to Storage
     * 
     * @param $file , $path 
     * 
     * return file name
     */
    public function delete($path, $fileName)
    {
        Storage::delete('public/images/' . $path . $fileName);
    }
    /** 
     * get filesize 
     * 
     * @param $file , $precision 
     * 
     * return size
     */
    public function fileSize($file, $precision = 2)
    {
        $size = $file->getSize();

        if ($size > 0) {
            $size = (int)$size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');
            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        }

        return $size;
    }
}
