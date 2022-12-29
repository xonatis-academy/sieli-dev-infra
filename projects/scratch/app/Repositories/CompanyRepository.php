<?php

namespace App\Repositories;

use App\Models\Company;
use app\Repositories\EntryRepository;

class CompanyRepository extends EntryRepository {

    protected function getData(): array {
        return [
            new Company(1, 'Google'),
            new Company(2, 'Microsoft'),
            new Company(3, 'Apple')
        ];
    }

}