<?php

namespace App\Models;

class Person implements EntryInterface {
    private int $id;
    private string $firstname;
    private string $lastname;

    public function __construct(int $id, string $firstname, string $lastname)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function toString() {
        return $this->firstname . ' ' . $this->lastname;
    }
}