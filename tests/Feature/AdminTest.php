<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_we_can_force_login()
    {
        $response = $this->get('/force-login');
        
        $response->assertStatus(302);
        
        $this->assertNotNull(User::first());
    }
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_we_can_see_the_login_page()
    {
        $response = $this->get('/login');
        
        $response->assertSee('Admin Login') ;
    }
}
