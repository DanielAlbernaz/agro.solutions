<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Painel\ControllerBlog as PainelControllerBlog;
use App\Models\BannerBlog;
use App\Models\Blog;
use App\Models\Empresa;
use Illuminate\Http\Request;

class ControllerBlog extends Controller
{
    function index()
    {
        PainelControllerBlog::inactivateDate();

        $blog = Blog::where('status', 1)->orderByDesc('id')->get();
        $blogRecentes = Blog::where('status', 1)->orderByDesc('id')->limit(3)->get();
        $bannerBlog = BannerBlog::find(1);
        $empresa = Empresa::all();

        return view('site.paginas.blog', \compact('blog', 'bannerBlog', 'empresa', 'blogRecentes'));
    }
}
