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
    const SEPARATOR_TYPE = ' ';
    const SEPARATOR_VALUE = 20;

    public static function printResults(array $array)
    {
        foreach ($array as $name => $value) {
            if ($name === '.' || $name ==='..') {
                continue;
            }

            $separator = self::countNeededSeparators($name);

            if(!is_file(getcwd() . '/' . $name)) {
                echo "\033[31m" . $name . "\033[0m" . $separator . $value . " B" . PHP_EOL;
            } else {
                echo $name . $separator . $value . " B" . PHP_EOL;
            }

        }
    }

    private static function countNeededSeparators(string $word): string
    {
        $returnValue = '';
        $spaceBetween = self::SEPARATOR_VALUE - strlen($word);

        for ($i = 0; $i < $spaceBetween; $i++) {
            $returnValue .= self::SEPARATOR_TYPE;
        }

        return $returnValue;
    }

    public static function countSizes(string $folder): array
    {
        $folderContents = scandir($folder);
        $preparedArray = self::prepareArray($folderContents);

        if (is_dir($folder)) {
            foreach ($preparedArray as $key => $value) {
                if ($key === '.' || $key === '..') {
                    continue;
                }

                if (is_file($key)) {
                    $preparedArray[$key] = filesize($key);
                    continue;
                } else {
                    $preparedArray[$key] += self::countAll($folder . '/' . $key);
                }
            }
        }

        return $preparedArray;
    }

    private static function prepareArray(array $array): array
    {
        $preparedArray = array_flip($array);
        $preparedArray = array_fill_keys(array_keys($preparedArray), 0);

        return $preparedArray;
    }

    private static function countAll(string $path): int
    {
        $folderItems = scandir($path);
        $sum = 0;

        unset($folderItems[0]);
        unset($folderItems[1]);

        foreach ($folderItems as $item) {
            if (is_file($path . '/' . $item)) {
                $sum += filesize($path . '/' . $item);
            } else {
                $sum += self::countAll($path . '/' . $item);
            }
        }

        return $sum;
    }
}
