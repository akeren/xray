<?php
$image_1 = imagecreatefromjpeg('samuel.jpg');
$image_2 = imagecreatefromjpeg('sammy.jpg');
imagealphablending($image_1, true);
imagesavealpha($image_1, true);
imagecopy($image_1, $image_2, 0, 0, 0, 0, 100, 100);
imagepng($image_1, 'image_3.png');
?>