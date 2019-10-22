<?php

namespace App;

abstract class FileLoader{

    private $file;
    
    private function __construct(string $file)
    {
        $this->file = $file;
    }
}