<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;
    public function setUp()
    {
        parent::setUp();
        $this->thread = factory('App\Thread')->create();
    }
    /**
     @test
     */
    public function a_user_can_view_all_threads()
    {
        $response = $this->get('/threads')
            ->assertSee($this->thread->title);

    }
    /**
     @test
     */
    public function a_user_can_read_single_thread()
    {
        $thread = factory('App\Thread')->create();

        $this->get('/threads/' . $this->thread->id)
            ->assertSee($this->thread->title);
    }
    public function a_user_can_reply_thread()
    {
        $reply = factory('App\Reply')
            ->create(['thread_id' => $this->thread->id]);
        $response = $this->get('/threads/' . $this->thread->id)
            ->assertSee($reply->body);

    }

}
