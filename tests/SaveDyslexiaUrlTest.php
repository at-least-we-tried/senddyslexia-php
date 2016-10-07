<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SaveDyslexiaUrlTest extends TestCase
{
    use DatabaseTransactions;

    public function testExample()
    {
        $this->visit('/')
            ->click('Try')
            ->type('svt.se', 'url')
            ->press('Try')
            ->seePageIs('/try/svt.se')
            ->seeInDatabase('links', [
                'url' => 'svt.se'
            ]);
    }
}
