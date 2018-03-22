<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 所有分类 ID 数组
        $category_ids = Category::all()->pluck('id')->toArray();

        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);
        // $faker = Faker\Factory::create('zh_CN');

        $articles = factory(Article::class)
                            ->times(100)
                            ->make()
                            ->each(function ($article, $index)
                                use ($category_ids)
        {
            $article->fill($article->toArray());
            $article->save();
            $article->categories()->attach(modul_array_round($category_ids));
        });
    }
}
