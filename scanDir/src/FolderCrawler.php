<?php
/**
 * Created by PhpStorm.
 * User: flagoon
 * Date: 09.06.18
 * Time: 00:08
 */
declare(strict_types=1);

namespace Flagoon;

class FolderCrawler
{

    public function countSizes(string $folder) {
        if(is_dir($folder) && $folder !== '/home/flagoon/Workspace/group_it/scanDir/vendor') {
            $folderContents = scandir($folder);
            foreach ($folderContents as $folderContent) {
                if ($folderContent === '.' || $folderContent === '..') {
                    continue;
                }
                if (is_file($folderContent)) {
                    echo $folderContent . PHP_EOL;
                    continue;
                } else {
                    echo '#' . $folderContent . PHP_EOL;
                    $this->countSizes($folder . '/' . $folderContent);
                }
            }
        }
    }

    private function countAll()
    {
        
    }
}
