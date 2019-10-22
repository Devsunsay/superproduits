<?php

namespace App;

class IniFileLoader extends FileLoader
{
    static public function iniFileLoad()
    {
        $data = parse_ini_file($this->file, true);

        return $data;
    }
}
