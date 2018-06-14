<?php
declare(strict_types = 1);

header('Access-Control-Allow-Origin: *');

require __DIR__ . '/vendor/autoload.php';
use Flagoon\FolderCrawler;

$folderCrawler = new FolderCrawler();

switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        echo json_encode($folderCrawler->countSizes(getcwd()));
        break;
    case 'POST':
        $folder = json_decode(file_get_contents("php://input"), true);
        chdir($folder['name']);
        echo json_encode($folderCrawler->countSizes(getcwd()));
        break;
}