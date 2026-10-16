<?php

namespace App\Http\Controllers\Admin\Concerns;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Shared image-upload handling for the admin CRUD controllers: stores the file
 * on the `public` disk under a folder and removes the previous file when it was
 * one we uploaded earlier (bundled/absolute paths are never touched).
 */
trait StoresUploads
{
    protected function storeImage(?string $old, UploadedFile $file, string $dir): string
    {
        $path = $file->store($dir, 'public');

        if (
            $old
            && $old !== $path
            && ! str_starts_with($old, '/')
            && ! str_starts_with($old, 'http')
            && Storage::disk('public')->exists($old)
        ) {
            Storage::disk('public')->delete($old);
        }

        return $path;
    }
}
