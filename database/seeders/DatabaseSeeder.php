<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
     

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => 'jef modjo',
        //     'email' => 'jefmodjo@gmail.com',
        //     'username' => 'jefmodjo',
        //     'password' => bcrypt('123')
        // ]);

        // User::create([
        //     'name' => 'Lin ahmad',
        //     'email' => 'linahmad@gmail.com',
        //     'username' => 'linahmad',
        //     'password' => bcrypt('123')
        // ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'Web-programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Post::factory(20)->create();


        // Post::create([
        //     'title' => 'judul pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia reiciendis cumque ducimus corrupti et. Aut perferendis accusamus illo neque doloremque!',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum tenetur praesentium reprehenderit commodi earum alias quia, veniam, sunt dignissimos blanditiis hic asperiores fugiat consequatur minima explicabo! Error consequatur omnis esse cupiditate minima aliquid asperiores distinctio. Iste neque veritatis placeat iusto dolorum, tempore sit doloremque laudantium at tempora mollitia non fugit obcaecati modi soluta dignissimos, quasi nostrum autem odit deleniti vel maxime. Ullam, iure vitae facere in obcaecati totam non, possimus, laudantium doloremque rerum illum culpa minima aliquam explicabo. Eum harum, modi vero similique quae tenetur pariatur doloribus consectetur, fuga saepe facilis vel. Ratione atque accusantium accusamus, corrupti laudantium aliquid ut quos!',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'judul kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia reiciendis cumque ducimus corrupti et. Aut perferendis accusamus illo neque doloremque!',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum tenetur praesentium reprehenderit commodi earum alias quia, veniam, sunt dignissimos blanditiis hic asperiores fugiat consequatur minima explicabo! Error consequatur omnis esse cupiditate minima aliquid asperiores distinctio. Iste neque veritatis placeat iusto dolorum, tempore sit doloremque laudantium at tempora mollitia non fugit obcaecati modi soluta dignissimos, quasi nostrum autem odit deleniti vel maxime. Ullam, iure vitae facere in obcaecati totam non, possimus, laudantium doloremque rerum illum culpa minima aliquam explicabo. Eum harum, modi vero similique quae tenetur pariatur doloribus consectetur, fuga saepe facilis vel. Ratione atque accusantium accusamus, corrupti laudantium aliquid ut quos!',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'judul ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia reiciendis cumque ducimus corrupti et. Aut perferendis accusamus illo neque doloremque!',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum tenetur praesentium reprehenderit commodi earum alias quia, veniam, sunt dignissimos blanditiis hic asperiores fugiat consequatur minima explicabo! Error consequatur omnis esse cupiditate minima aliquid asperiores distinctio. Iste neque veritatis placeat iusto dolorum, tempore sit doloremque laudantium at tempora mollitia non fugit obcaecati modi soluta dignissimos, quasi nostrum autem odit deleniti vel maxime. Ullam, iure vitae facere in obcaecati totam non, possimus, laudantium doloremque rerum illum culpa minima aliquam explicabo. Eum harum, modi vero similique quae tenetur pariatur doloribus consectetur, fuga saepe facilis vel. Ratione atque accusantium accusamus, corrupti laudantium aliquid ut quos!',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);

        

    }
}