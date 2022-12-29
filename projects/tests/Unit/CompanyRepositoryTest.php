<?php

require_once __DIR__ . '/../../app/Kernel.php';

use App\Repositories\CompanyRepository;
use PHPUnit\Framework\TestCase;

class CompanyRepositoryTest extends TestCase {

    private CompanyRepository $repository;

    protected function setUp(): void {
        parent::setUp();
        $this->repository = new CompanyRepository();
    }

    public function test_getData_return_data() {
        $result = $this->repository->search('a');
        $this->assertNotEmpty($result);
    }

}