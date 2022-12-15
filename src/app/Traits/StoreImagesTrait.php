<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StoreImagesTrait
{
    public function storeImages(array|UploadedFile $images, string $directory) : array
    {
        $images = $images instanceof UploadedFile ? [$images] : $images;

        $saveDir =
            substr(config('filesystems.images_dir'), -1) === '/'
                ? sprintf('%s%s', config('filesystems.images_dir'), $directory)
                : sprintf('%s/%s', config('filesystems.images_dir'), $directory);

        $filePaths = [];

        foreach ($images as $image) {
            do {
                $hashedFileName = $image->hashName();
                $hashedFilePath = sprintf('%s/%s', $saveDir, $hashedFileName);
            } while (Storage::disk()->exists($hashedFilePath));

            $storedFileName = Storage::putFileAs(
                $saveDir,
                $image,
                $hashedFileName
            );

            if (Str::startsWith($storedFileName, '/public\/')) {
                $storedFileName = Str::replaceFirst('/public\/', '', $storedFileName);
            } elseif (Str::startsWith($storedFileName, 'public/')) {
                $storedFileName = Str::replaceFirst('public/', '', $storedFileName);
            }

            $filePaths[] = $storedFileName;
        }

        return $filePaths;
    }
}
