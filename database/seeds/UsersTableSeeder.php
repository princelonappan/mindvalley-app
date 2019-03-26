<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_ids = App\Models\Category::all('id')->pluck('id')->toArray();
        factory(App\Models\User::class)->create()->each(function ($user) use ($category_ids)
        {
            $k = array_rand($category_ids);
            $category_id = $category_ids[$k];
            factory(App\Models\Article::class)->create(['user_id'=>$user->id, 
                'category_id' => $category_id]);
        });
    }

}
