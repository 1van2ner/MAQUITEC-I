<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ProductImageGalleryTest extends TestCase
{
    use RefreshDatabase;

    private array $imagePaths = [];

    protected function tearDown(): void
    {
        foreach ($this->imagePaths as $image) {
            $path = public_path($image);

            if (is_file($path)) {
                unlink($path);
            }
        }

        parent::tearDown();
    }

    public function test_product_images_can_be_added_removed_and_kept_up_to_four(): void
    {
        $this->actingAs(User::factory()->create());
        $category = Categoria::query()->firstOrFail();

        $this->post(route('admin.productos.store'), [
            'nombre' => 'Producto con galería',
            'stock' => 3,
            'descripcion' => 'Producto para probar la galería.',
            'categoria_id' => $category->id,
            'imagenes' => [
                $this->fakeImage('frente.png'),
                $this->fakeImage('lado.png'),
                $this->fakeImage('detalle.png'),
                $this->fakeImage('uso.png'),
            ],
        ])->assertRedirect(route('admin.productos.index'));

        $product = Producto::where('nombre', 'Producto con galería')->firstOrFail();
        $initialImages = $product->gallery_images;
        $this->imagePaths = $initialImages;

        $this->assertCount(4, $initialImages);

        $this->get(route('admin.productos.edit', $product->id))
            ->assertOk()
            ->assertSee('eliminar_imagenes[]')
            ->assertSee('name="imagenes[]"', false);

        $this->put(route('admin.productos.update', $product->id), [
            'nombre' => $product->nombre,
            'stock' => $product->stock,
            'descripcion' => $product->descripcion,
            'categoria_id' => $category->id,
            'eliminar_imagenes' => [$initialImages[0]],
            'imagenes' => [$this->fakeImage('repuesto.png')],
        ])->assertRedirect(route('admin.productos.index'));

        $updatedImages = $product->fresh()->gallery_images;
        $this->imagePaths = array_merge($this->imagePaths, $updatedImages);

        $this->assertCount(4, $updatedImages);
        $this->assertSame(array_slice($initialImages, 1), array_slice($updatedImages, 0, 3));
        $this->assertFileDoesNotExist(public_path($initialImages[0]));
    }

    private function fakeImage(string $name): UploadedFile
    {
        return UploadedFile::fake()->createWithContent(
            $name,
            base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+aWQAAAABJRU5ErkJggg==')
        );
    }
}
