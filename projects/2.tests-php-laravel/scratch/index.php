<?php

require_once __DIR__ . '/app/Kernel.php';

use App\Controllers\Searchcontroller;
use App\Repositories\CompanyRepository;
use App\Repositories\PersonRepository;
use App\Services\SearchService;

$companyRepository = new CompanyRepository();
$personRepository = new PersonRepository();
$service = new SearchService([$companyRepository, $personRepository]);
$controller = new Searchcontroller($service);

$results = $controller->search('a');
var_dump($results);