<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_create_new_category_success(): void
    {
        if ($token = auth()->attempt(["email" => "emreatessoy@gmail.com", "password" => "emre0209"])) {
            $response = $this->postJson("api/category/store", [
                "name" => "test1"
            ],["Authorization"=>"Bearer $token"]);
            $response->assertStatus(true);
            $this->assertTrue(true);
        }
    }
}
