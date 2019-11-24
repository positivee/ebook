<?php

namespace Tests\Concerns;

use Illuminate\Support\Facades\File;

trait RefreshDatabase
{
    /**
     * Refresh the database to a clean version.
     */
    public function refreshDatabase(): void
    {
        $basePath = base_path('storage/base.sqlite');

        $copyPath = base_path('storage/database.sqlite');

        if (!File::exists($basePath)) {
            File::copy($copyPath, $basePath);
        } else {
            File::copy($basePath, $copyPath);
        }
    }
}