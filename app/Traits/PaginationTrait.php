<?php

namespace App\Traits;

trait PaginationTrait
{
    public function pagination($files)
    {
        $currentPage = $files->currentPage();
        $perPage = $files->perPage();
        $startIndex = ($currentPage - 1) * $perPage;

        return $startIndex;
    }
}
