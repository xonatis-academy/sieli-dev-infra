<?php

namespace App\Controllers;

use App\Services\SearchService;

class Searchcontroller {

    private SearchService $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function search(string $text): array {
        return $this->searchService->search($text);
    }

}