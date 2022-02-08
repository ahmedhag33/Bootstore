<?php

namespace App\Triats;

/*----------------------
 * trait to use method to any controllers  
 *--------------------
 */

trait General
{
    public function saveimage($photo, $path)
    {
        $file_extention = $photo->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extention;
        $photo->move($path, $file_name);
        return $file_name;
    }
}
