<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::create([
            'title' => 'Web Progaming' ,
            'slug' => 'web-progaming' ,
            'color' => 'blue'
        ]) ;

        Category::create([
            'title' => 'Personal' ,
            'slug' => 'personal' ,
            'color' => 'yellow'
            ]) ;

        Category::create([
            'title' => 'Web Design' ,
            'slug' => 'web-design' , 
            'color' => 'red'
        ]) ;

        $bayu = User::create([
            'name' => 'bayu aji' ,
            'username' => 'bayu' ,
            'email' => 'bayu@gmail.com' ,
            'email_verified_at' => now() ,
            'password' => Hash::make('password') ,
            'remember_token' => Str::random(10)
        ]) ;
        
        Post::factory(40)->recycle([
            User::factory(5)->create() ,
            $bayu 
        ])->create() ; 

        
    }
}
