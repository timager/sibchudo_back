<?php

namespace App\EventListener;

use App\Entity\Media;
use Doctrine\ORM\Event\LifecycleEventArgs;

class PostLoadEventListener
{

    private string $imagesDirectory;

    public function __construct(string $imagesDirectory)
    {
        $this->imagesDirectory = $imagesDirectory;
    }

    public function postLoad(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();
        if ($entity instanceof Media) {
            $entity->setDir($this->imagesDirectory);
        }
    }
}