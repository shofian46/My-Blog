<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        User::create([
            'name' => 'Shofian Al Fikri',
            'username' => 'shofian',
            'email' => 'shofian@gmail.com',
            'password' => bcrypt('1234')
        ]);

        // User::create([
        //     'name' => 'Toro',
        //     'email' => 'toro@gmail.com',
        //     'password' => bcrypt('123')
        // ]);


        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Quaerat alias autem molestias deserunt officia vero laboriosam accusamus facilis enim cupiditate, animi explicabo libero minima natus sequi maiores consequatur quam laudantium non, labore temporibus laborum. Recusandae laudantium nam dolor ea iusto delectus minima laboriosam expedita consectetur cumque! Autem nihil quo est.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Dua',
        //     'slug' => 'judul-ke-dua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Quaerat alias autem molestias deserunt officia vero laboriosam accusamus facilis enim cupiditate, animi explicabo libero minima natus sequi maiores consequatur quam laudantium non, labore temporibus laborum. Recusandae laudantium nam dolor ea iusto delectus minima laboriosam expedita consectetur cumque! Autem nihil quo est.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Tiga',
        //     'slug' => 'judul-ke-tiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Quaerat alias autem molestias deserunt officia vero laboriosam accusamus facilis enim cupiditate, animi explicabo libero minima natus sequi maiores consequatur quam laudantium non, labore temporibus laborum. Recusandae laudantium nam dolor ea iusto delectus minima laboriosam expedita consectetur cumque! Autem nihil quo est.',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Empat',
        //     'slug' => 'judul-ke-empat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Quaerat alias autem molestias deserunt officia vero laboriosam accusamus facilis enim cupiditate, animi explicabo libero minima natus sequi maiores consequatur quam laudantium non, labore temporibus laborum. Recusandae laudantium nam dolor ea iusto delectus minima laboriosam expedita consectetur cumque! Autem nihil quo est.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();
    }
}
