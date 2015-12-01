<?php

use App\Tag;
use App\User;
use App\Location;
use App\Category;
use App\Activity;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        /**
         * Create Tags
         */
        Tag::create(['title' => 'Programming']);
        Tag::create(['title' => 'Play games']);
        Tag::create(['title' => 'Gym']);

        /**
         * Create Users
         */
        User::create(['name' => 'Artyom Anashev', 'email' => 'madmed67@yandex.com', 'password' => Hash::make('password')]);
        User::create(['name' => 'Rustam Zinatov', 'email' => 'rustam@yandex.com', 'password' => Hash::make('password')]);
        User::create(['name' => 'Denis Pryazhenikov', 'email' => 'denis@yandex.com', 'password' => Hash::make('password')]);

        /**
         * Create Locations
         */
        Location::create(['title' => 'Work', 'latitude' => 59.923477, 'longitude' => 30.362176]);
        Location::create(['title' => 'Gym', 'latitude' => 59.849202, 'longitude' => 30.144245]);
        Location::create(['title' => 'Home', 'latitude' => 59.874941, 'longitude' => 29.825136]);

        /**
         * Create Categories
         */
        Category::create(['title' => 'Productivity']);
        Category::create(['title' => 'Sport']);
        Category::create(['title' => 'Waste of time']);
        Category::create(['title' => 'Rest']);

        /**
         * Create Activities
         */
        $activity1 = Activity::create(['user_id' => 1, 'location_id' => 1, 'category_id' => 1, 'date' => \Carbon\Carbon::now(), 'hours' => 3]);
        $activity2 = Activity::create(['user_id' => 2, 'location_id' => 2, 'category_id' => 1, 'date' => \Carbon\Carbon::now(), 'hours' => 4.5]);
        $activity3 = Activity::create(['user_id' => 2, 'location_id' => 1, 'category_id' => 2, 'date' => \Carbon\Carbon::now(), 'hours' => 2]);
        $activity4 = Activity::create(['user_id' => 3, 'location_id' => 3, 'category_id' => 1, 'date' => \Carbon\Carbon::now(), 'hours' => 1.5]);

        /**
         * Attach tags to activities
         */
        $activity1->tags()->attach([2,3]);
        $activity2->tags()->attach([1,3]);
        $activity3->tags()->attach([1,2,3]);
        $activity4->tags()->attach([1]);

        // $this->call(UserTableSeeder::class);

        Model::reguard();
    }
}
