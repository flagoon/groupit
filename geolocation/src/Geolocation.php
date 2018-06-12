<?php
/**
 * Created by PhpStorm.
 * User: flagoon
 * Date: 11.06.18
 * Time: 22:01
 */

namespace Flagoon;

class Geolocation
{
    private $picture;

    public static function checkExifAvailable()
    {
        return function_exists('read_exif_data');
    }

    public function __construct($picture)
    {
        if(!self::checkExifAvailable()) {
            echo "Exif not supported!";
            die();
        }

        if(!exif_imagetype($picture)) {
            echo "File is not a valid picture!";
            die();
        }

        $this->picture = $picture;
    }

    private function savePicture()
    {
        $uploadFolder = 'storage/';
        $fileName = $uploadFolder . basename($this->picture);

    }

    public function showPicture()
    {
        return "<img src='" . $this->picture . "' />";
    }
}