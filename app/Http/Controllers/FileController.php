<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function upload(UploadedFile $file, int $region_id, int $user_id, string $unic_folder)
    {
        $uid = Str::random('6');
        $folder = now()->format('Y-m') . "/" . $region_id . "/" . $user_id . '/' . $unic_folder;

        $originalName = $file->getClientOriginalName();

        $filePath = $file->storeAs($folder, $uid . "_" . $originalName, 'public');

        $url = Storage::url($filePath);

        return $url;
    }

    public function loadMore(UploadedFile $file, string $path) : string
    {
        $uid = Str::random('6');

        $originalName = $file->getClientOriginalName();

        $folder = str_replace('storage/', '', dirname($path));

        $filePath = $file->storeAs($folder, $uid . "_" . $originalName, 'public');

        $url = Storage::url($filePath);
        return $url;
    }

    public function destroy(string $oldFilePath) : void
    {
        $file = str_replace('/storage/', '', $oldFilePath);

        if(Storage::disk('public')->exists($file)){
            storage::disk('public')->delete($file);
        }
    }
}
