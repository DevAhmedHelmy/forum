<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThreadsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use DatabaseMigrations;
    public function setUp()
    {
        parent::setUp();
        $this->thread = factory('App\Thread')->create();
    }

    public function test_a_user_can_view_all_threads()
    {
        
        $response = $this->get('/threads');
        $response->assertSee($this->thread->title);

        
    }

    function test_a_user_can_read_a_single_thread()
    {
         
        $response = $this->get('/threads/'.$this->thread->id);
        $response->assertSee($this->thread->title);

    }
    function test_a_user_can_read_replies_that_are_associated_with_a_thread()
    {
        $reply = factory('App\Reply')->create(['thread_id' => $this->thread->id]);
        $response = $this->get('/threads/'.$this->thread->id);
        $response->assertSee($reply->body);
    }
}
