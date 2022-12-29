<?php

namespace App\Repositories;

abstract class EntryRepository {

    protected abstract function getData(): array;

    public function search(string $text): array {
        $results = [];
        $text = strtolower($text);
        foreach ($this->getData() as $data) {
            if (strpos(strtolower($data->toString()), $text) !== false) {
                $results[] = $data;
            }
        }
        return $results;
    }
}