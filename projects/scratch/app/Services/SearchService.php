<?php

namespace App\Services;

class SearchService {

    private array $repositories;

    public function __construct(array $repositories)
    {
        $this->repositories = $repositories;
    }

    public function search(string $text): array {
        $results = [];
        foreach ($this->repositories as $repository) {
            $result = $repository->search($text);
            $results = array_merge($results, $result);
        }
        return $results;
    }

}