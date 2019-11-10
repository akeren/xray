<?php

function create($file){
	$extension = strtolower(strrchr($file, '.'));

    switch ($extension) {
        case '.jpg':
        case '.jpeg':
            $img = @imagecreatefromjpeg($file);
            break;
        case '.gif':
            $img = @imagecreatefromgif($file);
            break;
        case '.png':
            $img = @imagecreatefrompng($file);
            break;
        default:
            $img = false;
            break;
    }
	return $img;
}
function mergeTwoUp($filename_x, $filename_y, $filename_result) {

 // Get dimensions for specified images

 list($width_x, $height_x) = getimagesize($filename_x);
 list($width_y, $height_y) = getimagesize($filename_y);

 // Create new image with desired dimensions

 $image = imagecreatetruecolor($width_x + $width_y, $height_x);

 // Load images and then copy to destination image

 $image_x = create($filename_x);
 $image_y = create($filename_y);

 imagecopy($image, $image_x, 0, 0, 0, 0, $width_x, $height_x); ///  top left
 imagecopy($image, $image_y, $width_x, 0, 0, 0, $width_y, $height_y); /// top right cell
 

 // Save the resulting image to disk (as JPEG)

 imagejpeg($image, $filename_result);

 // Clean up

 imagedestroy($image);
 imagedestroy($image_x);
 imagedestroy($image_y);
 
return $filename_result;

}


function mergeTwoDown($filename_x, $filename_y, $filename_result) {

 // Get dimensions for specified images

 list($width_x, $height_x) = getimagesize($filename_x);
 list($width_y, $height_y) = getimagesize($filename_y);

 // Create new image with desired dimensions

 $image = imagecreatetruecolor($width_x, $height_x + $height_y);

 // Load images and then copy to destination image

 $image_x = create($filename_x);
 $image_y = create($filename_y);

imagecopy($image, $image_x, 0, 0, 0, 0, $width_x, $height_x); ///  top left
imagecopy($image, $image_y, 0, $height_y, 0, 0, $width_y, $height_y);  /// bottom left

 // Save the resulting image to disk (as JPEG)

 imagejpeg($image, $filename_result);

 // Clean up

 imagedestroy($image);
 imagedestroy($image_x);
 imagedestroy($image_y);
 
return $filename_result;

}



function mergeThreeDown($filename_x, $filename_y, $filename_z, $filename_result) {

 // Get dimensions for specified images

 list($width_x, $height_x) = getimagesize($filename_x);
 list($width_y, $height_y) = getimagesize($filename_y);
 list($width_z, $height_z) = getimagesize($filename_z);

 // Create new image with desired dimensions

 $image = imagecreatetruecolor($width_x, $height_x + $height_y + $height_z);

 // Load images and then copy to destination image

 $image_x = create($filename_x);
 $image_y = create($filename_y);
 $image_z = create($filename_z);

 imagecopy($image, $image_x, 0, 0, 0, 0, $width_x, $height_x); ///  top left
 
imagecopy($image, $image_y, 0, $height_y, 0, 0, $width_y, $height_y);  /// bottom left
imagecopy($image, $image_z, 0, $height_y + $height_z, 0, 0, $width_z, $height_z);  /// bottom left

 // Save the resulting image to disk (as JPEG)

 imagejpeg($image, $filename_result);

 // Clean up

 imagedestroy($image);
 imagedestroy($image_x);
 imagedestroy($image_y);
 
return $filename_result;

}


function mergeThreeUp($filename_x, $filename_y, $filename_z, $filename_result) {

 // Get dimensions for specified images

 list($width_x, $height_x) = getimagesize($filename_x);
 list($width_y, $height_y) = getimagesize($filename_y);
 list($width_z, $height_z) = getimagesize($filename_z);

 // Create new image with desired dimensions

 $image = imagecreatetruecolor($width_x + $width_y + $width_z, $height_x);

 // Load images and then copy to destination image

 $image_x = create($filename_x);
 $image_y = create($filename_y);
 $image_z = create($filename_z);



 imagecopy($image, $image_x, 0, 0, 0, 0, $width_x, $height_x); ///  top left
 imagecopy($image, $image_y, $width_x, 0, 0, 0, $width_y, $height_y); /// top right cell
 imagecopy($image, $image_z, $width_x + $width_y, 0, 0, 0, $width_z, $height_z); /// top right cell

 // Save the resulting image to disk (as JPEG)

 imagejpeg($image, $filename_result);

 // Clean up

 imagedestroy($image);
 imagedestroy($image_x);
 imagedestroy($image_y);
 
return $filename_result;

}


function mergeFourSquare($filename_w, $filename_x, $filename_y, $filename_z, $filename_result) {

 // Get dimensions for specified images

list($width_w, $height_w) = getimagesize($filename_w);
list($width_x, $height_x) = getimagesize($filename_x);
list($width_y, $height_y) = getimagesize($filename_y);
list($width_z, $height_z) = getimagesize($filename_z);

 // Create new image with desired dimensions

 $image = imagecreatetruecolor($width_w + $width_x, $height_w + $height_y);

 // Load images and then copy to destination image

 $image_w = create($filename_w);
 $image_x = create($filename_x); 
 $image_y = create($filename_y);
 $image_z = create($filename_z);

 imagecopy($image, $image_w, 0, 0, 0, 0, $width_w, $height_w); ///  top left
 imagecopy($image, $image_x, $width_w, 0, 0, 0, $width_x, $height_x); /// top right cell
 
imagecopy($image, $image_z, $width_z, $height_z, 0, 0, $width_z, $height_z); /// bottom right
imagecopy($image, $image_y, 0, $height_y, 0, 0, $width_y, $height_y);  /// bottom left

 // Save the resulting image to disk (as JPEG)

 imagejpeg($image, $filename_result);

 // Clean up

 imagedestroy($image);
 imagedestroy($image_x);
 imagedestroy($image_y);
 
return $filename_result;

}

function mergeFourUp($filename_w, $filename_x, $filename_y, $filename_z, $filename_result) {

 // Get dimensions for specified images

list($width_w, $height_w) = getimagesize($filename_w);
list($width_x, $height_x) = getimagesize($filename_x);
list($width_y, $height_y) = getimagesize($filename_y);
list($width_z, $height_z) = getimagesize($filename_z);

 // Create new image with desired dimensions

 $image = imagecreatetruecolor($width_w + $width_x + $width_y + $width_z, $height_w);

 // Load images and then copy to destination image

 $image_w = create($filename_w);
 $image_x = create($filename_x); 
 $image_y = create($filename_y);
 $image_z = create($filename_z);

 imagecopy($image, $image_w, 0, 0, 0, 0, $width_w, $height_w); ///  top left
 imagecopy($image, $image_x, $width_w, 0, 0, 0, $width_x, $height_x); /// top right cell
 imagecopy($image, $image_y, $width_w + $width_x, 0, 0, 0, $width_y, $height_y); /// top right cell
 imagecopy($image, $image_z, $width_w + $width_x + $width_y, 0, 0, 0, $width_z, $height_z); /// top right cell


 // Save the resulting image to disk (as JPEG)

 imagejpeg($image, $filename_result);

 // Clean up

 imagedestroy($image);
 imagedestroy($image_x);
 imagedestroy($image_y);
 
return $filename_result;

}


function mergeFourDown($filename_w, $filename_x, $filename_y, $filename_z, $filename_result) {

 // Get dimensions for specified images

list($width_w, $height_w) = getimagesize($filename_w);
list($width_x, $height_x) = getimagesize($filename_x);
list($width_y, $height_y) = getimagesize($filename_y);
list($width_z, $height_z) = getimagesize($filename_z);

 // Create new image with desired dimensions

 $image = imagecreatetruecolor($width_w, $height_w + $height_x + $height_y + $height_z);

 // Load images and then copy to destination image

 $image_w = create($filename_w);
 $image_x = create($filename_x); 
 $image_y = create($filename_y);
 $image_z = create($filename_z);

 imagecopy($image, $image_w, 0, 0, 0, 0, $width_w, $height_w); ///  top left
 imagecopy($image, $image_x, 0, $height_w, 0, 0, $width_x, $height_x); /// top right cell
 imagecopy($image, $image_y, 0, $height_w + $height_x, 0, 0, $width_y, $height_y); /// top right cell
 imagecopy($image, $image_z, 0, $height_w + $height_x + $height_y, 0, 0, $width_z, $height_z); /// top right cell


 // Save the resulting image to disk (as JPEG)

 imagejpeg($image, $filename_result);

 // Clean up

 imagedestroy($image);
 imagedestroy($image_x);
 imagedestroy($image_y);
 
return $filename_result;
}
?>