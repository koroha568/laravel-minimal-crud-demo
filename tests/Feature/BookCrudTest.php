<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_books_index_displays_saved_books(): void
    {
        Book::query()->create([
            'title' => 'Laravel実践',
            'author' => 'Sato',
            'price' => 2800,
        ]);

        $response = $this->get('/books');

        $response->assertOk();
        $response->assertSee('Laravel実践');
    }

    public function test_store_validates_and_redirects_back_on_error(): void
    {
        $response = $this->from('/books/create')->post('/books', [
            'title' => '',
            'author' => 'Sato',
            'price' => -1,
        ]);

        $response->assertRedirect('/books/create');
        $response->assertSessionHasErrors(['title', 'price']);
    }

    public function test_store_update_and_destroy_work(): void
    {
        $storeResponse = $this->post('/books', [
            'title' => 'Laravel入門',
            'author' => 'Suzuki',
            'price' => 2400,
        ]);

        $storeResponse->assertRedirect('/books');
        $this->assertDatabaseHas('books', [
            'title' => 'Laravel入門',
            'author' => 'Suzuki',
            'price' => 2400,
        ]);

        $book = Book::query()->firstOrFail();

        $updateResponse = $this->patch("/books/{$book->id}", [
            'title' => 'Laravel入門 改訂版',
            'author' => 'Suzuki',
            'price' => 2600,
        ]);

        $updateResponse->assertRedirect('/books');
        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'title' => 'Laravel入門 改訂版',
            'price' => 2600,
        ]);

        $deleteResponse = $this->delete("/books/{$book->id}");

        $deleteResponse->assertRedirect('/books');
        $this->assertDatabaseMissing('books', [
            'id' => $book->id,
        ]);
    }
}
