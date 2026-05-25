<?php

namespace Tests;

use App\Services\MongoLogService;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Setup the test environment.
     * MongoDB est mocké pour éviter toute tentative de connexion pendant les tests.
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Remplacer MongoLogService par un mock silencieux.
        // Toutes les méthodes retournent leurs valeurs par défaut (void / []).
        $this->instance(
            MongoLogService::class,
            \Mockery::mock(MongoLogService::class)->shouldIgnoreMissing()
        );
    }
}
