<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThreadTest extends TestCase
{
	use DatabaseMigrations;
	protected $thread;
	public function setUp()
	{
		parent::setUp();
		$this->thread = factory('App\Thread')->create();
	}
    public function test_a_thread_has_a_replies()
    {
    	
        $this->assertInstanceOf(Collection::class,$this->thread->replies);
    }

    public function test_a_thread_has_a_creater()
    {
    	 
        $this->assertInstanceOf('App\User',$this->thread->creater);
    }

    public function test_a_thread_can_add_reply()
    {
    	 $this->thread->addReply([
    	 		'body' => 'foobar',
    	 		'user_id' => 1
    	 	]);
    	 $this->assertCount(1,$this->thread->replies);
        // $this->assertInstanceOf('App\User',$this->thread->creater);
    }
}
