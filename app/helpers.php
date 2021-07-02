<?php

if (!function_exists('decoderDataImage')) {
    function decoderDataImage($encoderImage)
    {
        return base64_decode(
            preg_replace('#^data:image/\w+;base64,#i', '', $encoderImage)
        );
    }
}

if (!function_exists('getExtensionImageFromImageInfo')) {
    function getExtensionImageFromImageInfo($image)
    {
        return preg_replace('#image/#', '', $image->mime());
    }
}

if (!function_exists('getImageOrDefault')) {
    function getImageOrDefault($imagePath)
    {
        if (!file_exists(storage_path('app/public/' . $imagePath))) {
            return asset('storage/default_image/default-image.png');
        }
        return asset('storage/' . $imagePath);
    }
}
