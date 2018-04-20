<?php

use App\Models\BookType;
use Illuminate\Database\Seeder;

class InflowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = BookType::all();
        foreach ($books as $book){
            DB::table('inflows')->insert([
                'book_type_id' => $book->id,
                'quantity' => 45,
                'created_at' => '2017-08-23 23:18:21',
                'updated_at' => '2017-08-23 23:18:21'
            ]);
        }
    }
}
