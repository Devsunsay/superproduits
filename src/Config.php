<?php

namespace App;

use App\FileLoader\FileLoaderFactory;

class Config
{
    private $file;
    private $parameters;
    private $fileLoader;

    public function __construct(string $file)
    {
        $this->file = $file;
        $this->fileLoader = FileLoaderFactory::buildFileLoader($this->file);
        $this->load();
    }

    public function __get(string $name)
    {
        return $this->parameters[$name] ?? null;
    }

    /**
     * Loads Configuration file in internal parameters array
     *
     * @return void
     * @throws Exception If file does not exist or parse ini file fails
     */
    private function load(): void
    {
        if (!file_exists($this->file) || !($this->parameters = $this->fileLoader->load())) {
            throw new Exception("Une erreur est survenue lors du chargement du fichier de configuration");
        }
    }
}
