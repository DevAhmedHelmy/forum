<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReplyTest extends TestCase
{
	use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_it_has_an_owner()
    {
    	$reply = factory('App\Reply')->create();
        $this->assertInstanceOf('App\User',$reply->owner);
    }
    
}
