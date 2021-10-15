<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\BannerBlog;
use App\Models\Blog;
use App\Models\Empresa;
use App\Models\Telefone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ControllerBlogView extends Controller
{
    function index(Request $request)
    {
        $idBlog = session('idBlog');

        if(!Session::has('idBlog')){
            return redirect()->action(['App\Http\Controllers\Site\ControllerPrincipal@index']);
        }

        $request->session()->put('pagina', 'blog');
        $request->session()->put('id', $idBlog);

        $blog = Blog::where('status', 1)->where('id', $idBlog)->get();
        $blogRecentes = Blog::where('status', 1)->orderByDesc('id')->limit(3)->get();
        $empresa = Empresa::all();
        $telefones = Telefone::all();
        $bannerBlog = BannerBlog::find(1);

        return view('site.paginas.blogView', \compact('blog', 'blogRecentes', 'empresa', 'telefones', 'bannerBlog'));
    }
}
