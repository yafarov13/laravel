<?php

namespace Tests\Feature;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_status_success(): void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function test_create_status_success(): void
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function test_store_news_success(): void
    {
        $data = [
            'title' => 'Some title',
            'author' => 'Admin',
            'description' => 'Some text'
        ];

        $response = $this->post(route('admin.news.store'), $data);

        $response->assertJson($data)
                 ->assertCreated();
    }


    public function test_store_feedback_success(): void
    {
        $data = [
            'userName' => 'Admin',
            'feedback' => 'Some text'
        ];

        $response = $this->post(route('feedback.store'), $data);

        $response->assertSuccessful();
    }

    public function test_store_agregatore_viewMissing(): void
    {
        $data = [
            'client' => 'Admin',
            'phone' => '1231231231',
            'email' => '1@1',
            'info' => 'Text',
            'key' => 'key'
        ];

        $response = $this->post(route('agregator.store'), $data);

        $response->assertViewMissing($data);
    }

    public function test_index_category_status_success(): void
    {
        $response = $this->get(route('category'));

        $response->assertOk();
    }

    /* public function test_category_list_successful_response(): void
    {
        $categories = Controller::getCategory();
        $categories = array_keys($categories);

        $response = $this->get("/categories/" . $categories[mt_rand(0, count($categories)-1)]);
        $response->assertStatus(200);
    } */



}
