<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 1/5/2019
 * Time: 17:01
 */
namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploadService
{
    /**
     * @param UploadedFile $image
     * @param string $targetDir
     * @return string
     */
    public function upload(UploadedFile $image, string $targetDir): string
    {
        $imageName = md5(uniqid()).'.'.$image->guessExtension();
        $image->move(
            $targetDir, $imageName
        );

        return $imageName;
    }
}