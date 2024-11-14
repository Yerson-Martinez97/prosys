<?php
function showPhoto($base, $currentPhoto)
{
    $defaultPhoto = 'Assets/images/noimage.png';

    if (!file_exists($currentPhoto)) {
        return $base . $defaultPhoto;
    }
    return $base . $currentPhoto;
}
