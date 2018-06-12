<?php
declare(strict_types = 1);

use Flagoon\Geolocation;

require __DIR__ . '/vendor/autoload.php';

$picture = $_FILES['picture']['tmp_name'];

$geoloc = new Geolocation($picture);

echo $geoloc->showPicture();

