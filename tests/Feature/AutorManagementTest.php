<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Author;

class AutorManagementTest extends TestCase
{
    use RefreshDatabase;

   public function test_an_author_can_be_created()
   {

        $this->withoutExceptionHandling();
        $this->post('/author', [
            'name'=> 'Author Name',
            'dob'=> '05/14/1988'
        ]);
        $this->assertCount(1, Author::all());
   }
}
