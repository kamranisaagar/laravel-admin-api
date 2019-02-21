<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Transformer\PageTransformer;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'role:administrator|moderator']);
    }

    public function index()
    {
        return fractal(Page::all(), new PageTransformer())->respond();
    }

    public function show(Page $page)
    {
        return fractal($page, new PageTransformer())->toArray();
    }

    public function update(Page $page, Request $request)
    {
        $page->content = $request->content;
        $page->save();
        return fractal($page, new PageTransformer())->toArray();
    }
}
