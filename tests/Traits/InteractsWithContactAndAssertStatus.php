<?php

namespace Tests\Traits;

trait InteractsWithContactAndAssertStatus
{
    /**
     * Make sure we can post to the contact form.
     *
     * @return $response
     */
    public function touchApiAndAssert($data, $status = 200)
    {
        $response = $this->json('POST', '/api/contact', $data);

        $response->assertStatus($status);

        return $response;
    }
}
