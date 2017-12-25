<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Traits\InteractsWithContactAndAssertStatus;

class FormSubmissionTest extends TestCase
{
    use RefreshDatabase, InteractsWithContactAndAssertStatus;
    
    /**
     * @var array
     */
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
        $this->touchApiAndAssert($this->contactData);
    }
    
    /**
     * Make sure we can post to the contact form
     */
    public function test_if_we_can_submit_the_form_and_we_are_missing_the_number()
    {
        $this->touchApiAndAssert(array_only($this->contactData, ['message', 'name', 'email']));

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
        
        $this->touchApiAndAssert($contact, 422);
        
        $this->assertDatabaseMissing('messages', $contact);
    }
    
    /**
     * See if we insert the phone number into the database
     */
    public function test_if_we_can_see_the_number_in_the_DB()
    {
        $this->touchApiAndAssert($this->contactData);
        
        $this->assertDatabaseHas('messages', $this->contactData);
    }
    
    /**
     * Make sure we send the mail
     */
    public function test_if_we_can_send_an_email() 
    {
        Mail::fake();

        $response = $this->touchApiAndAssert($this->contactData);

        $message = $response->json();
        
        Mail::assertSent(Message::class, function ($mail) use ($message) {
            return $mail->message->id === $message['id'];
        });
    }
}
