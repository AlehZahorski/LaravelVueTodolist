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
            'name' => $this->faker->text
        ];
    }

    private function getFakeItemsDataForUpdate(): array
    {
        return [
            'completed' => $this->faker->boolean
        ];
    }

    public function test_user_can_get_all_items()
    {
        $this
            ->get('/api/items')
            ->assertOk()
            ->assertJsonStructure([
                'success',
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'completed',
                        'completed_at',
                        ]
                ]
            ]);
    }

    public function test_user_can_get_item()
    {
        $this
            ->get('/api/items/1')
            ->assertOk();
    }

    public function test_user_can_create_item()
    {
        $this->post('/api/item/store',
            $this->getFakeItemsDataForCreate())
            ->assertCreated();
    }

    public function test_user_can_update_item()
    {
        $this->put('/api/item/1',
            $this->getFakeItemsDataForUpdate())
            ->assertOk();
    }

    public function test_user_can_delete_item()
    {
        $this->delete('/api/item/1')
            ->assertOk();
    }
}
