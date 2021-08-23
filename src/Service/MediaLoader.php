<?php


namespace App\Service;


use App\Entity\Media;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class MediaLoader
{
    private string $targetDir;

    public function __construct(string $targetDir)
    {
        $this->targetDir = $targetDir;
    }

    public function uploadArray(array $files): array
    {
        $medias = [];
        foreach ($files as $file) {
            $medias[] = $this->upload($file);
        }
        return $medias;
    }

    public function upload(UploadedFile $file): ?Media
    {
        $extension = $file->guessExtension();
        if (in_array($extension, ['jpeg', 'jpg', 'png', 'webp'])) {
            $media = new Media();
            $fileName = md5(uniqid()) . '.' . $extension;
            $file->move($this->getTargetDir(), $fileName);
            $media->setDestination($fileName);
        } else {
            $media = null;
        }
        return $media;
    }

    public function deleteFile(Media $media): void
    {
        $fileName = str_replace("/uploads/avatars/", '', $media->getDestination());
        if (file_exists($this->targetDir . $fileName)) {
            unlink($this->targetDir . $fileName);
        }
    }

    public function getTargetDir(): string
    {
        return $this->targetDir;
    }

}