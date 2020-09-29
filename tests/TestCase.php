<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('passport:install');
    }
    public function tearDown(): void
    {


        Artisan::call('migrate:fresh');
        parent::tearDown();
    }


}

