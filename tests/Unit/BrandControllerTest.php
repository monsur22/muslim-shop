<?php

namespace Tests\Unit;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BrandControllerTest extends TestCase
{
    use RefreshDatabase;

    // protected function setUp(): void
    // {
    //     parent::setUp();
    //     $this->user = User::factory()->create(); // Assuming you have a User factory for authentication
    // }
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_it_can_list_all_brands()
    {
        $brands = Brand::factory()->count(3)->create();
        $response = $this->getJson('/api/brands');
        $response->assertStatus(200);
        $response->assertJsonCount(3, 'data');
    }

    public function test_it_can_create_a_brand()
    {
        Storage::fake('public');
        $data = [
            'name' => 'Test Brand',
            'image' => UploadedFile::fake()->image('brand.jpg')
        ];

        $response = $this->postJson('/api/brands', $data);
        $response->assertStatus(201)
            ->assertJsonPath('data.name', 'Test Brand');

        Storage::disk('public')->assertExists('images/' . $data['image']->hashName());
    }

    public function test_it_can_show_a_brand()
    {
        $brand = Brand::factory()->create();

        $response = $this->getJson("/api/brands/{$brand->id}");

        $response->assertStatus(200)
            ->assertJsonPath('data.id', $brand->id);
    }

    public function test_it_can_update_a_brand()
    {
        Storage::fake('public');

        $brand = Brand::factory()->create();

        $data = [
            'name' => 'Updated Brand',
            'image' => UploadedFile::fake()->image('updated_brand.jpg')
        ];

        $response = $this->putJson("/api/brands/{$brand->id}", $data);

        $response->assertStatus(200)
            ->assertJsonPath('data.name', 'Updated Brand');

        Storage::disk('public')->assertExists('images/' . $data['image']->hashName());
    }

    public function test_it_can_delete_a_brand()
    {
        Storage::fake('public');

        $brand = Brand::factory()->create();
        $image = UploadedFile::fake()->image('brand.jpg')->store('images', 'public');
        $brand->images()->create(['url' => $image]);

        $response = $this->deleteJson("/api/brands/{$brand->id}");

        $response->assertStatus(204);

        $this->assertSoftDeleted($brand);

        Storage::disk('public')->assertMissing($image);
    }

    public function test_it_validates_create_request()
    {
        $response = $this->postJson('/api/brands', [
            'name' => '',
            'image' => 'not-an-image' // invalid value for image
        ]);
        // $response->dump(); // Add this line to see the response content

        $response->assertStatus(422);

        // Check that the response has a 'data' key and that it contains validation errors for 'name' and 'image'
        $response->assertJsonStructure([
            'success',
            'message',
            'data' => [
                'name',
                'image',
            ],
        ]);
    }


    public function test_it_validates_update_request()
    {
        $brand = Brand::factory()->create();

        $response = $this->patchJson("/api/brands/{$brand->id}", [
            'name' => '',
            'image' => 'any thing'
        ]);
        $response->dump(); // Add this line to see the response content

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'success',
            'message',
            'data' => [
                'name',
                'image',
            ],
        ]);
    }
}
