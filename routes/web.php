<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerBanner;
use App\Http\Controllers\ControllerProduto;
use App\Http\Controllers\ControllerUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;


Route::get('/', 'App\Http\Controllers\Site\ControllerPrincipal@index')->name('principal');

Auth::routes();




Route::post('/busca-imoveis', 'App\Http\Controllers\Site\ControllerTerrenos@busca')->name('busca');
Route::post('/busca-animais', 'App\Http\Controllers\Site\ControllerAnimais@busca')->name('buscaAnimais');
Route::post('/busca-equipamentos', 'App\Http\Controllers\Site\ControllerEquipamentos@busca')->name('buscaEquipamentos');




Route::post('envia-contato',  'App\Http\Controllers\ControllerContato@index');


Route::post('/logar', [ControllerUser::class, 'logar'])->name('logar');
/**Usuários painel */


//Parametro nessa rota para detalhes do mimove
Route::get('/institucional', 'App\Http\Controllers\Site\ControllerInstitucional@index')->name('institucional');

Route::get('/terrenos', 'App\Http\Controllers\Site\ControllerTerrenos@index')->name('terrenos');
Route::get('terrenoView/{idTerreno}', function(Request $request, $id){
    $request->session()->put('idTerreno', $id);
    return Redirect::route('terreno');
});
Route::get('/terreno', 'App\Http\Controllers\Site\ControllerTerreno@index')->name('terreno');

Route::get('/animais', 'App\Http\Controllers\Site\ControllerAnimais@index')->name('animais');
Route::get('animalView/{idAnimal}', function(Request $request, $id){
    $request->session()->put('idAnimal', $id);
    return Redirect::route('animal');
});
Route::get('/animal', 'App\Http\Controllers\Site\ControllerAnimal@index')->name('animal');

Route::get('/equipamentos', 'App\Http\Controllers\Site\ControllerEquipamentos@index')->name('equipamentos');
Route::get('equipamentoView/{idEquipamento}', function(Request $request, $id){
    $request->session()->put('idEquipamento', $id);
    return Redirect::route('equipamento');
});
Route::get('/equipamento', 'App\Http\Controllers\Site\ControllerEquipamento@index')->name('equipamento');


Route::get('/blog', 'App\Http\Controllers\Site\ControllerBlog@index')->name('blog');
Route::get('blogView/{idBlog}', function(Request $request, $id){
    $request->session()->put('idBlog', $id);
    return Redirect::route('blogView');
});
Route::get('/blogView', 'App\Http\Controllers\Site\ControllerBlogView@index')->name('blogView');



Route::get('/politica-privacidade', 'App\Http\Controllers\Site\ControllerPolitica@index')->name('politica');
Route::get('/termo-uso', 'App\Http\Controllers\Site\ControllerTermo@index')->name('termo');



Route::middleware(['auth'])->group(function() {
    Route::prefix('sistema')->group(function(){

        Route::get('/', function () {
            return view('painel/principal');
        });

            Route::name('usuario.')->group(function (){
                Route::get('/cadastrar-usuario', [ControllerUser::class, 'create'])->name('cadastrar');
                Route::post('/salvar-usuario', [ControllerUser::class, 'store'])->name('salvar');
                Route::get('/listar-usuario', [ControllerUser::class, 'list'])->name('listar');
                Route::post('/status-usuario', [ControllerUser::class, 'status'])->name('status');
                Route::get('/editar-usuario/{id}', [ControllerUser::class, 'findUser'])->name('find');
                Route::post('/edit-usuario', [ControllerUser::class, 'edit'])->name('edit');
                Route::post('/deletar-usuario/{id}', [ControllerUser::class, 'delete'])->name('delete');
                Route::get('/logout', [ControllerUser::class, 'logout'])->name('logout');
            });


            Route::name('banner.')->group(function (){
                Route::get('/cadastrar-banner', 'App\Http\Controllers\Painel\ControllerBanner@create')->name('cadastrar');
                Route::post('/salvar-banner', 'App\Http\Controllers\Painel\ControllerBanner@store')->name('salvar');
                Route::get('/listar-banner', 'App\Http\Controllers\Painel\ControllerBanner@list')->name('listar');
                Route::post('/status-banner', 'App\Http\Controllers\Painel\ControllerBanner@status')->name('status');
                Route::post('/deletar-banner/{id}', 'App\Http\Controllers\Painel\ControllerBanner@delete')->name('delete');
                Route::get('/editar-banner/{id}', 'App\Http\Controllers\Painel\ControllerBanner@find')->name('find');
                Route::post('/edit-banner', 'App\Http\Controllers\Painel\ControllerBanner@edit')->name('edit');
            });

            Route::name('bannerMini.')->group(function (){
                Route::get('/cadastrar-bannerMini', 'App\Http\Controllers\Painel\ControllerBannerMini@create')->name('cadastrar');
                Route::post('/salvar-bannerMini', 'App\Http\Controllers\Painel\ControllerBannerMini@store')->name('salvar');
                Route::get('/listar-bannerMini', 'App\Http\Controllers\Painel\ControllerBannerMini@list')->name('listar');
                Route::post('/status-bannerMini', 'App\Http\Controllers\Painel\ControllerBannerMini@status')->name('status');
                Route::post('/deletar-bannerMini/{id}', 'App\Http\Controllers\Painel\ControllerBannerMini@delete')->name('delete');
                Route::get('/editar-bannerMini/{id}', 'App\Http\Controllers\Painel\ControllerBannerMini@find')->name('find');
                Route::post('/edit-bannerMini', 'App\Http\Controllers\Painel\ControllerBannerMini@edit')->name('edit');
            });

            Route::name('menu.')->group(function (){
                Route::get('/cadastrar-menu', 'App\Http\Controllers\Painel\ControllerMenu@create')->name('cadastrar');
                Route::post('/salvar-menu', 'App\Http\Controllers\Painel\ControllerMenu@store')->name('salvar');
                Route::get('/listar-menu', 'App\Http\Controllers\Painel\ControllerMenu@list')->name('listar');
                Route::post('/status-menu', 'App\Http\Controllers\Painel\ControllerMenu@status')->name('status');
                Route::post('/deletar-menu/{id}', 'App\Http\Controllers\Painel\ControllerMenu@delete')->name('delete');
                Route::get('/editar-menu/{id}', 'App\Http\Controllers\Painel\ControllerMenu@find')->name('find');
                Route::post('/edit-menu', 'App\Http\Controllers\Painel\ControllerMenu@edit')->name('edit');
            });

            Route::name('categoriaAnimal.')->group(function (){
                Route::get('/cadastrar-categoriaAnimal', 'App\Http\Controllers\Painel\ControllerCategoriaAnimal@create')->name('cadastrar');
                Route::post('/salvar-categoriaAnimal', 'App\Http\Controllers\Painel\ControllerCategoriaAnimal@store')->name('salvar');
                Route::get('/listar-categoriaAnimal', 'App\Http\Controllers\Painel\ControllerCategoriaAnimal@list')->name('listar');
                Route::post('/status-categoriaAnimal', 'App\Http\Controllers\Painel\ControllerCategoriaAnimal@status')->name('status');
                Route::post('/deletar-categoriaAnimal/{id}', 'App\Http\Controllers\Painel\ControllerCategoriaAnimal@delete')->name('delete');
                Route::get('/editar-categoriaAnimal/{id}', 'App\Http\Controllers\Painel\ControllerCategoriaAnimal@find')->name('find');
                Route::post('/edit-categoriaAnimal', 'App\Http\Controllers\Painel\ControllerCategoriaAnimal@edit')->name('edit');
            });

            Route::name('categoriaBlog.')->group(function (){
                Route::get('/cadastrar-categoriaBlog', 'App\Http\Controllers\Painel\ControllerCategoriaBlog@create')->name('cadastrar');
                Route::post('/salvar-categoriaBlog', 'App\Http\Controllers\Painel\ControllerCategoriaBlog@store')->name('salvar');
                Route::get('/listar-categoriaBlog', 'App\Http\Controllers\Painel\ControllerCategoriaBlog@list')->name('listar');
                Route::post('/status-categoriaBlog', 'App\Http\Controllers\Painel\ControllerCategoriaBlog@status')->name('status');
                Route::post('/deletar-categoriaBlog/{id}', 'App\Http\Controllers\Painel\ControllerCategoriaBlog@delete')->name('delete');
                Route::get('/editar-categoriaBlog/{id}', 'App\Http\Controllers\Painel\ControllerCategoriaBlog@find')->name('find');
                Route::post('/edit-categoriaBlog', 'App\Http\Controllers\Painel\ControllerCategoriaBlog@edit')->name('edit');
            });

            Route::name('categoriaRaca.')->group(function (){
                Route::get('/cadastrar-categoriaRaca', 'App\Http\Controllers\Painel\ControllerCategoriaRaca@create')->name('cadastrar');
                Route::post('/salvar-categoriaRaca', 'App\Http\Controllers\Painel\ControllerCategoriaRaca@store')->name('salvar');
                Route::get('/listar-categoriaRaca', 'App\Http\Controllers\Painel\ControllerCategoriaRaca@list')->name('listar');
                Route::post('/status-categoriaRaca', 'App\Http\Controllers\Painel\ControllerCategoriaRaca@status')->name('status');
                Route::post('/deletar-categoriaRaca/{id}', 'App\Http\Controllers\Painel\ControllerCategoriaRaca@delete')->name('delete');
                Route::get('/editar-categoriaRaca/{id}', 'App\Http\Controllers\Painel\ControllerCategoriaRaca@find')->name('find');
                Route::post('/edit-categoriaRaca', 'App\Http\Controllers\Painel\ControllerCategoriaRaca@edit')->name('edit');
            });

            Route::name('categoriaMarca.')->group(function (){
                Route::get('/cadastrar-categoriaMarca', 'App\Http\Controllers\Painel\ControllerCategoriaMarca@create')->name('cadastrar');
                Route::post('/salvar-categoriaMarca', 'App\Http\Controllers\Painel\ControllerCategoriaMarca@store')->name('salvar');
                Route::get('/listar-categoriaMarca', 'App\Http\Controllers\Painel\ControllerCategoriaMarca@list')->name('listar');
                Route::post('/status-categoriaMarca', 'App\Http\Controllers\Painel\ControllerCategoriaMarca@status')->name('status');
                Route::post('/deletar-categoriaMarca/{id}', 'App\Http\Controllers\Painel\ControllerCategoriaMarca@delete')->name('delete');
                Route::get('/editar-categoriaMarca/{id}', 'App\Http\Controllers\Painel\ControllerCategoriaMarca@find')->name('find');
                Route::post('/edit-categoriaMarca', 'App\Http\Controllers\Painel\ControllerCategoriaMarca@edit')->name('edit');
            });



            Route::name('imovel.')->group(function (){
                Route::get('/cadastrar-imovel', 'App\Http\Controllers\Painel\ControllerImovel@create')->name('cadastrar');
                Route::post('/salvar-imovel', 'App\Http\Controllers\Painel\ControllerImovel@store')->name('salvar');
                Route::post('/salvar-galleria-terreno/{id}', 'App\Http\Controllers\Painel\ControllerImovel@storeGalleria')->name('galleria');
                Route::get('/listar-imovel', 'App\Http\Controllers\Painel\ControllerImovel@list')->name('listar');
                Route::post('/status-imovel', 'App\Http\Controllers\Painel\ControllerImovel@status')->name('status');
                Route::post('/deletar-imovel/{id}', 'App\Http\Controllers\Painel\ControllerImovel@delete')->name('delete');
                Route::post('/deletar-imovel-imagem/{id}', 'App\Http\Controllers\Painel\ControllerImovel@destroyImage')->name('destroy');
                Route::get('/editar-imovel/{id}', 'App\Http\Controllers\Painel\ControllerImovel@find')->name('find');
                Route::post('/edit-imovel', 'App\Http\Controllers\Painel\ControllerImovel@edit')->name('edit');
            });

            Route::name('animal.')->group(function (){
                Route::get('/cadastrar-animal', 'App\Http\Controllers\Painel\ControllerAnimal@create')->name('cadastrar');
                Route::post('/salvar-animal', 'App\Http\Controllers\Painel\ControllerAnimal@store')->name('salvar');
                Route::post('/salvar-galleria-animal/{id}', 'App\Http\Controllers\Painel\ControllerAnimal@storeGalleria')->name('galleria');
                Route::get('/listar-animal', 'App\Http\Controllers\Painel\ControllerAnimal@list')->name('listar');
                Route::post('/status-animal', 'App\Http\Controllers\Painel\ControllerAnimal@status')->name('status');
                Route::post('/deletar-animal/{id}', 'App\Http\Controllers\Painel\ControllerAnimal@delete')->name('delete');
                Route::post('/deletar-animal-imagem/{id}', 'App\Http\Controllers\Painel\ControllerAnimal@destroyImage')->name('destroy');
                Route::get('/editar-animal/{id}', 'App\Http\Controllers\Painel\ControllerAnimal@find')->name('find');
                Route::post('/edit-animal', 'App\Http\Controllers\Painel\ControllerAnimal@edit')->name('edit');
            });

            Route::name('equipamento.')->group(function (){
                Route::get('/cadastrar-equipamento', 'App\Http\Controllers\Painel\ControllerEquipamento@create')->name('cadastrar');
                Route::post('/salvar-equipamento', 'App\Http\Controllers\Painel\ControllerEquipamento@store')->name('salvar');
                Route::post('/salvar-galleria-equipamento/{id}', 'App\Http\Controllers\Painel\ControllerEquipamento@storeGalleria')->name('galleria');
                Route::get('/listar-equipamento', 'App\Http\Controllers\Painel\ControllerEquipamento@list')->name('listar');
                Route::post('/status-equipamento', 'App\Http\Controllers\Painel\ControllerEquipamento@status')->name('status');
                Route::post('/deletar-equipamento/{id}', 'App\Http\Controllers\Painel\ControllerEquipamento@delete')->name('delete');
                Route::post('/deletar-equipamento-imagem/{id}', 'App\Http\Controllers\Painel\ControllerEquipamento@destroyImage')->name('destroy');
                Route::get('/editar-equipamento/{id}', 'App\Http\Controllers\Painel\ControllerEquipamento@find')->name('find');
                Route::post('/edit-equipamento', 'App\Http\Controllers\Painel\ControllerEquipamento@edit')->name('edit');
            });

            Route::name('blog.')->group(function (){
                Route::get('/cadastrar-blog', 'App\Http\Controllers\Painel\ControllerBlog@create')->name('cadastrar');
                Route::post('/salvar-blog', 'App\Http\Controllers\Painel\ControllerBlog@store')->name('salvar');
                Route::post('/salvar-galleria-blog/{id}', 'App\Http\Controllers\Painel\ControllerBlog@storeGalleria')->name('galleria');
                Route::get('/listar-blog', 'App\Http\Controllers\Painel\ControllerBlog@list')->name('listar');
                Route::post('/status-blog', 'App\Http\Controllers\Painel\ControllerBlog@status')->name('status');
                Route::post('/deletar-blog/{id}', 'App\Http\Controllers\Painel\ControllerBlog@delete')->name('delete');
                Route::post('/deletar-blog-imagem/{id}', 'App\Http\Controllers\Painel\ControllerBlog@destroyImage')->name('destroy');
                Route::get('/editar-blog/{id}', 'App\Http\Controllers\Painel\ControllerBlog@find')->name('find');
                Route::post('/edit-blog', 'App\Http\Controllers\Painel\ControllerBlog@edit')->name('edit');
            });

            Route::name('institucional.')->group(function (){
                Route::get('/editar-institucional/{id}', 'App\Http\Controllers\Painel\ControllerInstitucional@find')->name('find');
                Route::post('/edit-institucional', 'App\Http\Controllers\Painel\ControllerInstitucional@edit')->name('edit');
            });

            Route::name('bannerInstitucional.')->group(function (){
                Route::get('/editar-bannerInstitucional/{id}', 'App\Http\Controllers\Painel\ControllerBannerInstitucional@find')->name('find');
                Route::post('/edit-bannerInstitucional', 'App\Http\Controllers\Painel\ControllerBannerInstitucional@edit')->name('edit');
            });

            Route::name('bannerAnimal.')->group(function (){
                Route::get('/editar-bannerAnimal/{id}', 'App\Http\Controllers\Painel\ControllerBannerAnimal@find')->name('find');
                Route::post('/edit-bannerAnimal', 'App\Http\Controllers\Painel\ControllerBannerAnimal@edit')->name('edit');
            });

            Route::name('smtp.')->group(function (){
                Route::get('/editar-smtp/{id}', 'App\Http\Controllers\Painel\ControllerSmtp@find')->name('find');
                Route::post('/edit-smtp', 'App\Http\Controllers\Painel\ControllerSmtp@edit')->name('edit');
            });

            Route::name('fraseRodape.')->group(function (){
                Route::get('/editar-fraseRodape/{id}', 'App\Http\Controllers\Painel\ControllerFraseRodape@find')->name('find');
                Route::post('/edit-fraseRodape', 'App\Http\Controllers\Painel\ControllerFraseRodape@edit')->name('edit');
            });

            Route::name('bannerEquipamento.')->group(function (){
                Route::get('/editar-bannerEquipamento/{id}', 'App\Http\Controllers\Painel\ControllerBannerEquipamento@find')->name('find');
                Route::post('/edit-bannerEquipamento', 'App\Http\Controllers\Painel\ControllerBannerEquipamento@edit')->name('edit');
            });

            Route::name('bannerTerreno.')->group(function (){
                Route::get('/editar-bannerTerreno/{id}', 'App\Http\Controllers\Painel\ControllerBannerTerreno@find')->name('find');
                Route::post('/edit-bannerTerreno', 'App\Http\Controllers\Painel\ControllerBannerTerreno@edit')->name('edit');
            });

            Route::name('bannerBlog.')->group(function (){
                Route::get('/editar-bannerBlog/{id}', 'App\Http\Controllers\Painel\ControllerBannerBlog@find')->name('find');
                Route::post('/edit-bannerBlog', 'App\Http\Controllers\Painel\ControllerBannerBlog@edit')->name('edit');
            });

            Route::name('empresa.')->group(function (){
                Route::get('/editar-empresa/{id}', 'App\Http\Controllers\Painel\ControllerEmpresa@find')->name('find');
                Route::post('/edit-empresa', 'App\Http\Controllers\Painel\ControllerEmpresa@edit')->name('edit');
            });

            Route::name('politica.')->group(function (){
                Route::get('/editar-politica/{id}', 'App\Http\Controllers\Painel\ControllerPolitica@find')->name('find');
                Route::post('/edit-politica', 'App\Http\Controllers\Painel\ControllerPolitica@edit')->name('edit');
            });

            Route::name('termo.')->group(function (){
                Route::get('/editar-termo/{id}', 'App\Http\Controllers\Painel\ControllerTermo@find')->name('find');
                Route::post('/edit-termo', 'App\Http\Controllers\Painel\ControllerTermo@edit')->name('edit');
            });

            Route::name('instalacoes.')->group(function (){
                Route::get('/editar-instalacoes/{id}', 'App\Http\Controllers\Painel\ControllerInstalacoes@find')->name('find');
                Route::post('/edit-instalacoes', 'App\Http\Controllers\Painel\ControllerInstalacoes@edit')->name('edit');
                Route::post('/salvar-galleria-instalacoes/{id}', 'App\Http\Controllers\Painel\ControllerInstalacoes@storeGalleria')->name('galleria');
                Route::post('/deletar-instalacoes-imagem/{id}', 'App\Http\Controllers\Painel\ControllerInstalacoes@destroyImage')->name('destroy');
            });



    });
});










