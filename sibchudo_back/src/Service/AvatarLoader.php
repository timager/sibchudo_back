<?php


namespace App\Service;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class AvatarLoader
{
    private $targetDir;

    public function __construct(string $targetDir)
    {
        $this->targetDir = $targetDir;
    }

    public function upload(UploadedFile $file)
    {
        $extension = $file->guessExtension();
        if (in_array($extension, ['jpeg', 'jpg', 'png','webp'])) {
            $fileName = md5(uniqid()) . '.' . $extension;
            $file->move($this->getTargetDir(), $fileName);
        } else {
            $fileName = null;
        }
        return $fileName;
    }

    public function delete($fileName){
        if($fileName!==null){
            $fileName = str_replace("/uploads/avatars/",'',$fileName);
            unlink($this->targetDir.$fileName);
        }
    }

    public function getTargetDir()
    {
        return $this->targetDir;
    }

}