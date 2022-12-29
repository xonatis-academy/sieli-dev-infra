<?php

namespace App\Repositories;

use App\Models\Person;
use app\Repositories\EntryRepository;

class PersonRepository extends EntryRepository {

    protected function getData(): array {
        return [
            new Person(1, 'Annie', 'Versaire'),
            new Person(2, 'Jean', 'Aimmare'),
            new Person(3, 'Vincent', 'Time'),
            new Person(4, 'Leo', 'Part')
        ];
    }

}