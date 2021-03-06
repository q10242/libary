<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Auth\Events\Validated;

class BooksController extends Controller
{
    public function store()
    {
        $book = Book::create($this->validateRequest());
        return redirect($book->path());
    }

    public function update(Book $book) 
    {
        $book->update($this->validateRequest());
        return redirect($book->path());
    }

    private function validateRequest()
    {
        return request()->validate([
            'title'=> 'required',
            'author'=>'required'
        ]);
    }

    public function destory(Book $book)
    {
        $book->delete();
        return redirect('/books');
    } 
}
