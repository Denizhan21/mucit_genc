<?php
function create_code(){
    $first = rand(1111,9999);
    $second = substr(uniqid(),0,4);
    $third = rand(1111,9999);
    return $first.'-'.$second.'-'.$third;
}

/*function compressImage($source, $destination, $quality)
{

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);

    imagejpeg($image, $destination, $quality);

}*/
