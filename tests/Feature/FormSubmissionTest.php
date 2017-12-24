<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormSubmissionTest extends TestCase
{
    use RefreshDatabase;
    
    protected $contactData = [
        'message' => 'This is a message',
        'name' => 'John Smith',
        'email' => 'john.smith@example.com',
        'number' => '989-493-4690',
    ];
    
    /**
     * Make sure we can post to the contact form
     */
    public function test_if_we_can_submit_the_form()
    {
        $response = $this->json('POST', '/api/contact', $this->contactData);

        $response->assertStatus(200);
    }
    
    /**
     * Make sure we can post to the contact form
     */
    public function test_if_we_can_submit_the_form_and_we_are_missing_the_number()
    {
        $response = $this->json('POST', '/api/contact', array_only($this->contactData, ['message', 'name', 'email']));

        $response->assertStatus(200);

        $this->assertDatabaseMissing('messages', ['number' => '989-493-4690']);
    }
    
    /**
     * See if we get an 422 for invalid data
     */
    public function test_if_we_get_a_422_for_invalid_data()
    {
        $contact = array_merge(
            array_only($this->contactData, ['name', 'message']), [
                'eml' => 'john.smith@example.com'
            ]
        );
        
        $response = $this->json('POST', '/api/contact', $contact);

        $response->assertStatus(422);
        
        $this->assertDatabaseMissing('messages', $contact);
    }
    
    /**
     * See if we insert the phone number into the database
     */
    public function test_if_we_can_see_the_number_in_the_DB()
    {
        $response = $this->json('POST', '/api/contact', $this->contactData);

        $response->assertStatus(200);
        
        $this->assertDatabaseHas('messages', $this->contactData);
    }
}
