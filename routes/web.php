<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/', 'PagesController@home')->name('index');

Route::get('/empresa', 'PagesController@empresa')->name('empresa');
Route::get('/servicios', 'PagesController@servicios')->name('servicios');
Route::get('/servicio/{id}', 'PagesController@servicio')->name('servicio');
Route::get('/clientes', 'PagesController@clientes')->name('clientes');
Route::get('/blog', 'PagesController@blog')->name('blog');
Route::get('/post/{id}', 'PagesController@post')->name('post');
Route::get('/solicitud-de-presupuesto', 'PagesController@cotizacion')->name('cotizacion');
Route::get('/contacto', 'PagesController@contacto')->name('contacto');
Route::post('enviar-cotizacion', 'MailController@quote')->name('send-quote');
Route::post('enviar-contacto', 'MailController@contact')->name('send-contact');
Route::post('newsletter', 'NewsLetterController@storeNewsletter')->name('newsletter.store');

Route::get('/certificado/{id}', 'PagesController@certificado')->name('certificado');

Route::get('/ficha-tecnica/{id}/{campo}', 'ProductController@fichaTecnica')->name('ficha-tecnica');
Route::delete('/ficha-tecnica/{id}/{campo}', 'ProductController@borrarFichaTecnica')->name('borrar-ficha-tecnica');
Route::post('/imagen-descrptiva/{id}', 'ProductController@borrarImagenDescriptiva')->name('borrar-imagen-descriptiva');

Route::group(['middleware' => ['role:Administrador|Gestor'], 'prefix' => 'admin'], function() {
    /** Page Home */
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('home/content', 'HomeController@content')->name('home.content');
    Route::post('home/content/generic-section/store', 'HomeController@store')->name('home.content.generic-section.store');
    Route::post('home/content/generic-section/update', 'HomeController@update')->name('home.content.generic-section.update');
    Route::post('home/updateInfo', 'HomeController@updateInfo')->name('home.update-info');
    Route::delete('home/content/{id}', 'HomeController@destroy')->name('home.content.destroy');
    Route::post('home/content/{id}', 'HomeController@certificateDestroy')->name('home.content.certificate-destroy');
    Route::get('home/content/slider/get-list', 'HomeController@sliderGetList')->name('home.slider.get-list');
    /** Fin home*/

    /** Page Company */
    Route::get('company/content', 'CompanyController@content')->name('company.content');
    Route::post('company/content/store-slider', 'CompanyController@storeSlider')->name('company.content.storeSlider');
    Route::post('company/content/update-slider', 'CompanyController@updateSlider')->name('company.content.updateSlider');
    Route::post('company/content/create-info', 'CompanyController@createInfo')->name('company.content.createInfo');
    Route::post('company/content/update-info', 'CompanyController@updateInfo')->name('company.content.updateInfo');
    Route::delete('company/content/{id}', 'CompanyController@destroy')->name('company.content.destroy');
    Route::get('company/content/slider/get-list', 'CompanyController@sliderGetList')->name('company.slider.get-list');
    Route::get('company/content/beneficios/get-list', 'CompanyController@getBeneficios');
    Route::get('company/content/empresa/get-list', 'CompanyController@getEmpresa');
    /** Fin company*/

    /** Page service */
    Route::get('service/content', 'ServiceController@content')->name('service.content');
    Route::get('service/create', 'ServiceController@create')->name('service.create');
    Route::post('service/store', 'ServiceController@store')->name('service.store');
    Route::get('service/edit/{id}', 'ServiceController@edit')->name('service.edit');
    Route::post('service/update', 'ServiceController@update')->name('service.update');
    Route::delete('service/content/{id}', 'ServiceController@destroy')->name('service.content.destroy');
    Route::get('service/content/slider/get-list', 'ServiceController@sliderGetList')->name('service.slider.get-list');
    Route::get('service/content/caracteristicas/get-list', 'ServiceController@getCaracteristicas');
    /** Fin service */
    Route::get('variable-content/{id?}', 'VariableContentController@getElement')->name('variable-content.find');
    Route::post('variable-content/store', 'VariableContentController@store')->name('variable-content.store');
    Route::post('variable-content/update', 'VariableContentController@update')->name('variable-content.update');
    Route::delete('variable-content/destroy/{id?}', 'VariableContentController@destroy')->name('variable-content.destroy');

    /** Page Clients */
    Route::get('client/content', 'ClientController@content')->name('client.content');
    Route::post('client/content/generic-section/store', 'ClientController@store')->name('client.content.generic-section.store');
    Route::post('client/content/generic-section/update', 'ClientController@update')->name('client.content.generic-section.update');
    Route::post('client/update', 'ClientController@update2')->name('client.update');
    Route::delete('client/content/{id}', 'ClientController@destroy')->name('client.content.destroy');
    Route::get('client/content/slider/get-list', 'ClientController@sliderGetList')->name('client.slider.get-list');
    /** Fin Clients*/

    /** Page Blog */
    Route::get('blog/content', 'BlogController@content')->name('blog.content');
    Route::get('blog/create', 'BlogController@create')->name('blog.create');
    Route::post('blog/store', 'BlogController@store')->name('blog.store');
    Route::get('blog/edit/{id}', 'BlogController@edit')->name('blog.edit');
    Route::post('blog/update', 'BlogController@update')->name('blog.update');
    Route::delete('blog/content/{id}', 'BlogController@destroy')->name('blog.content.destroy');
    Route::get('blog/content/slider/get-list', 'BlogController@sliderGetList')->name('blog.slider.get-list');
    Route::get('blog/content/caracteristicas/get-list', 'BlogController@getCaracteristicas');
    /** Fin Blog */

    /** Page newsletter */
    Route::get('newsletter/content', 'NewsLetterController@content')->name('newsletter.content');
    Route::get('newsletter/content/get-list', 'NewsLetterController@getList')->name('newsletter.content.get-list');
    Route::delete('newsletter/content/{id}', 'NewsLetterController@destroy')->name('newsletter.content.destroy');
    /** Fin newsletter*/

    Route::get('data/content', 'DataController@content')->name('data.content');
    Route::put('data/content', 'DataController@update')->name('data.content.update');
    
    Route::get('content/', 'ContentController@content')->name('content');
    Route::get('content/{id}', 'ContentController@findContent');
    Route::post('archive-destroy/{column}/{id}', 'ContentController@destroyArchive')->name('archive-destroy');

    Route::get('user/get-list', 'UserController@getList')->name('user.get-list');
    Route::resource('user', 'UserController');
});
