<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objects\Book;
use Faker;

class BookController extends Controller
{
    private function generateBooks(int $amount = 10) {
        $faker = Faker\Factory::create();

        $books = [];
        for ($i = 0; $i < $amount; $i++) {
            $books[$i + 1] = new Book($i + 1, $faker->sentence(5), $faker->name);
        }
        
        return $books;
    }

    private function getBookFromDB() {
        // Query Builder
    }
    
    public function getBook(int $id) {
        $books = $this->generateBooks();
        if ($id < 0 || $id > count($books)) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        return response()->json($books[$id]->toArray());
    }
}
