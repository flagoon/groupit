<?php
declare(strict_types = 1);

require __DIR__ . '/vendor/autoload.php';
use Flagoon\FolderCrawler;

$folderCrawler = new FolderCrawler();

$folderCrawler->countSizes(getcwd());