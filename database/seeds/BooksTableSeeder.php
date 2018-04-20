<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'language_id' => 2,
            'title' => 'Crushing It!: How Great Entrepreneurs Build Their Business and Influence-and How You Can, Too',
            'description' => '',
            'edition' => '1',
            'publication_Date' => '2018-01-30',
            'cover_image' => '51Mtk16ycvL._SX329_BO1,204,203,200_.jpg',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('books')->insert([
            'language_id' => 2,
            'title' => 'The Subtle Art of Not Giving a F*ck: A Counterintuitive Approach to Living a Good Life',
            'description' => '',
            'edition' => '1',
            'publication_Date' => '2016-09-13',
            'cover_image' => '51NzjhIhK0L._SX322_BO1,204,203,200_.jpg',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('books')->insert([
            'language_id' => 2,
            'title' => 'The Power of Habit: Why We Do What We Do in Life and Business',
            'description' => '',
            'edition' => '1',
            'publication_Date' => '2014-01-14',
            'cover_image' => '51s2gkMEa1L._SX327_BO1,204,203,200_.jpg',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('books')->insert([
            'language_id' => 2,
            'title' => 'Scrum: The Art of Doing Twice the Work in Half the Time',
            'description' => '',
            'edition' => '1',
            'publication_Date' => '2014-09-30',
            'cover_image' => '51VNlzbfpXL._SX331_BO1,204,203,200_.jpg',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('books')->insert([
            'language_id' => 2,
            'title' => 'Compelling People: The Hidden Qualities That Make Us Influential',
            'description' => '',
            'edition' => '1',
            'publication_Date' => '2016-09-13',
            'cover_image' => '51mK82jnesL._SX330_BO1,204,203,200_.jpg',
            'created_at' => '2017-08-24 23:18:21',
            'updated_at' => '2017-08-24 23:18:21'
        ]);
    }
}
