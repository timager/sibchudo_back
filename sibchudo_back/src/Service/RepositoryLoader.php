<?php


namespace App\Service;


use App\DatabaseConnector\Database;
use App\Repository\AbstractRepository;
use Doctrine\Common\Annotations\Reader;
use Symfony\Component\Security\Core\Security;

class RepositoryLoader
{
    private $reader;
    private $role;

    /**
     * RepositoryLoader constructor.
     * @param $reader
     */
    public function __construct(Reader $reader, Security $token)
    {
        $this->reader = $reader;
        $this->role = $token->getUser() === null ? Database::USER : Database::ADMIN;
    }


    public function loadRepository(string $repositoryClass):AbstractRepository{
        return new $repositoryClass($this->reader, $this->role);
    }

}