<?php

namespace App\FileLoader;

class IniFileLoader extends AbstractFileLoader
{
    /**
     * Parses ini File
     *
     * @return array|false
     */
    public function load()
    {
        return parse_ini_file($this->file);
    }
}
