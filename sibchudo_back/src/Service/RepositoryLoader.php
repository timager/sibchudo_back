<?php


namespace App\Service;


use App\Repository\AbstractRepository;
use Doctrine\Common\Annotations\Reader;

class RepositoryLoader
{
    private $reader;

    /**
     * RepositoryLoader constructor.
     * @param $reader
     */
    public function __construct(Reader $reader)
    {
        $this->reader = $reader;
    }


    public function loadRepository(string $repositoryClass):AbstractRepository{
        return new $repositoryClass($this->reader);
    }

}