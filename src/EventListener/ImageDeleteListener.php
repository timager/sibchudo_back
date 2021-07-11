<?php


namespace App\EventListener;


use App\Entity\Media;
use App\Service\MediaLoader;
use Doctrine\ORM\Event\LifecycleEventArgs;

class ImageDeleteListener
{
    private MediaLoader $loader;

    public function __construct(MediaLoader $loader) {
        $this->loader = $loader;
    }

    public function postRemove(LifecycleEventArgs $args) {
        $entity = $args->getObject();
        if($entity instanceof Media) {
            $this->loader->deleteFile($entity);
        }
    }
}