<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    function an_authenticated_user_can_create_new_forum_threads()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->actingAs(factory('App\User')->create());

        $thread = factory('App\Thread')->make();

        $this->post('/threads', $thread->toArray());

        $this->get($thread->path())
                ->assertSee($thread->title)
                ->assertSee($thread->body);
    }

    /**
     * @test
     */
    function guest_may_not_create_threads()
    {
        $thread = factory('App\Thread')->make();

        $this->post('/threads', $thread->toArray());

        $this->get($thread->path())
                ->assertSee($thread->title)
                ->assertSee($thread->body);
    }
}
