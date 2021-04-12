<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;

    private function getFakeItemsDataForCreate(): array
    {
        return [
            'item' => [
                'name' => 'test',
                'completed' => false
            ]
        ];
    }

    public function test_user_can_get_all_items()
    {
        $this
            ->get('/api/items')
            ->assertOk();
    }

    public function test_user_can_get_item()
    {
        $this
            ->get('/api/items/1')
            ->assertOk();
    }

    public function test_user_can_create_item()
    {
        $this->post('/api/items',
            $this->getFakeItemsDataForCreate())
            ->assertCreated();
    }
}
