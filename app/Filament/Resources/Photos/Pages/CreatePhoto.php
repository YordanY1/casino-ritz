<?php

namespace App\Filament\Resources\Photos\Pages;

use App\Filament\Resources\Photos\PhotoResource;
use App\Models\Photo;
use Filament\Resources\Pages\CreateRecord;

class CreatePhoto extends CreateRecord
{
    protected static string $resource = PhotoResource::class;

    protected function handleRecordCreation(array $data): Photo
    {
        if (is_array($data['path'])) {
            $albumId = $data['album_id'];
            $first = null;

            foreach ($data['path'] as $path) {
                $photo = Photo::create([
                    'album_id' => $albumId,
                    'path' => $path,
                ]);

                if (!$first) {
                    $first = $photo;
                }
            }

            return $first;
        }

        return Photo::create($data);
    }
}
