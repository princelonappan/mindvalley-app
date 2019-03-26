<?php

use Illuminate\Database\Seeder;

class ArticleTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag_ids = App\Models\Tag::all('id')->pluck('id')->toArray();
        $articles_ids = App\Models\Article::all('id')->pluck('id')->toArray();
        foreach($articles_ids as $id)
        {
            $k = array_rand($tag_ids);
            $tag_id = $tag_ids[$k];
            factory(App\Models\ArticleTag::class)->create(['article_id'=> $id, 
                'tag_id' => $tag_id]);
        }
        
    }
}
