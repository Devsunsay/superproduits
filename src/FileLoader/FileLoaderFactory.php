<?php

namespace App\FileLoader;

class FileLoaderFactory
{
    public static function buildFileLoader(string $file): AbstractFileLoader
    {
        $format = pathinfo($file, PATHINFO_EXTENSION);

        switch($format) {
            case 'ini':
                return new IniFileLoader($file);
                break;
            case 'json':
                return new JsonFileLoader($file);
                break;
            default:
                throw new \Exception("Format de fichier non supporté");
        }
    }
}
