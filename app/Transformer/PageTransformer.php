<?php
namespace App\Transformer;

use App\Models\Page;
use League\Fractal;

class PageTransformer extends Fractal\TransformerAbstract
{
    public function transform(Page $page)
    {
        return [
            'id' => $page->id,
            'content' => $page->content,
        ];
    }
}
