<?php

namespace App\Models;

class Company implements EntryInterface {
    private int $id;
    private string $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function toString() {
        return $this->name;
    }
}