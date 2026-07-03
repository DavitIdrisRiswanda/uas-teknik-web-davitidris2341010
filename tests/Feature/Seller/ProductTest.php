<?php

use App\Models\Category;
use App\Models\User;

test('seller can create product without image', function () {
    $seller = User::factory()->create(['role' => 'seller']);
    $category = Category::create(['name' => 'Test Category']);

    $this->actingAs($seller)
        ->post('/seller/products', [
            'category_id' => $category->id,
            'name' => 'Test Product',
            'description' => 'Test description',
            'price' => 100000,
            'stock' => 10,
        ])
        ->assertRedirect('/seller/products')
        ->assertSessionHas('success');

    $this->assertDatabaseHas('products', [
        'seller_id' => $seller->id,
        'category_id' => $category->id,
        'name' => 'Test Product',
    ]);
});
