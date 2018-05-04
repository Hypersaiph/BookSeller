<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        $this->call(LanguagesTableSeeder::class);
        $this->call(BooksTableSeeder::class);

        $this->call(TypesTableSeeder::class);
        $this->call(PublishersTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(AuthorsTableSeeder::class);

        $this->call(BookTypesTableSeeder::class);
        $this->call(BookGenresTableSeeder::class);
        $this->call(BookAuthorsTableSeeder::class);
        $this->call(BookPublisherTableSeeder::class);

        $this->call(ImageTypesTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(BookImagesTableSeeder::class);
        $this->call(CustomersTableSeeder::class);

        $this->call(InflowsTableSeeder::class);
        $this->call(SaleTypesTableSeeder::class);
        $this->call(SalesTableSeeder::class);
        $this->call(OutflowsTableSeeder::class);
        $this->call(AccountsTableSeeder::class);

        $this->call(UserSettingsTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(SyslogsTableSeeder::class);
        //$this->call(SaleTypesTableSeeder::class);

        //tablas secundarias
        $this->call(UserRoleTableSeeder::class);
    }
}
