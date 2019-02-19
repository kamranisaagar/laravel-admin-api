<?php
namespace App\Transformer;

use App\Models\Article;
use League\Fractal;

class ArticleTransformer extends Fractal\TransformerAbstract
{
    public function transform(Article $article)
    {
        return [
            'id' => $article->id,
            'title' => $article->title,
            'content' => $article->content,
        ];
    }
}
