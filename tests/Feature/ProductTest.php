<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{

    use RefreshDatabase;
    public function test_products_getAll(): void{
        $this->withExceptionHandling();

        Product::factory()->count(3)->create();

        $this->getJson('/api/products')
            ->assertOk()
            ->assertJsonCount(3);
    }

    public function test_products_getById(): void{
        $this->withExceptionHandling();

        $product = Product::factory()->create();

        $this->get(sprintf('/api/products/%s', $product->id))
            ->assertExactJson($product->toArray());
    }

    public function test_products_create(): void{
        $this->withExceptionHandling();

        $response = $this->postJson('/api/products', [
            'name'=> 'Product',
            'description' => 'test text',
            'cant' => 12
        ]);

        $response->assertOk();
    }

    public function test_products_update(): void{
        $this->withExceptionHandling();

        $product = Product::factory()->create();
        $product->name = 'Actualizado';

        $this->putJson(
            sprintf('/api/products/%s', $product->id),
            $product->toArray()
        )->assertOk();

    }

    public function test_products_delete(): void{
        $this->withExceptionHandling();

        $product = Product::factory()->create();

        $this->deleteJson(
            sprintf('/api/products/%s', $product->id)
        )->assertExactJson($product->toArray());
    }
}
