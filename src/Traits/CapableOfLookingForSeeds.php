<?php

namespace Khalyomede\LaravelSeed\Traits;

use Illuminate\Support\Collection;

trait CapableOfLookingForSeeds
{
    /**
     * @return Collection<string>
     */
    private function getSeedFilePaths(): Collection
    {
        $files = glob(database_path('seeders/*.php'));

        return collect($files)->map(fn ($path) => basename($path));
    }

    /**
     * @return Collection<string>
     */
    private function getSeedFileNames(): Collection
    {
        return $this->getSeedFilePaths()->map(function ($path) {
            return preg_replace("/\.php$/", "", $path);
        });
    }
}
