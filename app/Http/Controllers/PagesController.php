<?php

namespace App\Http\Controllers;

use SEO;
use App\Data;
use App\Page;
use App\Color;
use App\Content;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Phpfastcache\Helper\Psr16Adapter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PagesController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Data::first();
    }

    public function home()
    {
        $page = Page::where('name', 'inicio')->first();
        SEO::setTitle('home');
        SEO::setDescription(strip_tags($this->data->description));
        $sections   = $page->sections;
        $section1s  = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get();
        $section2   = $sections->where('name', 'section_2')->first()->contents()->first();
        $services   = Content::where('section_id', 9)->orderBy('order', 'DESC')->get();
        $posts      = Content::where('section_id', 13)->orderBy('order', 'DESC')->take(3)->get();
        return view('paginas.index', compact('section1s', 'section2', 'services', 'posts'));
    }

    public function empresa()
    {
        $page = Page::where('name', 'empresa')->first();
        $sections = $page->sections;
        $section1s = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get();
        $section2 = $sections->where('name', 'section_2')->first()->contents()->first();
        $section3 = $sections->where('name', 'section_3')->first()->contents()->first();
        $section4s = $sections->where('name', 'section_4')->first()->contents()->orderBy('order', 'ASC')->get();
        $section5s = $sections->where('name', 'section_5')->first()->contents()->orderBy('order', 'ASC')->get();
        SEO::setTitle('empresa');
        SEO::setDescription(strip_tags($section2->content_2));
        return view('paginas.empresa', compact('section1s', 'section2', 'section3', 'section4s', 'section5s'));
    }

    public function servicios()
    {
        $page = Page::where('name', 'servicios')->first();
        $sections = $page->sections;
        $section1 = $sections->where('name', 'section_1')->first()->contents()->first();
        $services = $sections->where('name', 'section_2')->first()->contents()->orderBy('order', 'ASC')->get();
        SEO::setTitle('servicios');
        SEO::setDescription(strip_tags($this->data->description));
        return view('paginas.servicios', compact('section1', 'services'));
    }

    public function servicio($id)
    {
        $service = Content::findOrFail($id);
        $services = Content::where('section_id', 9)->where('id', '<>', $id)->get();
        SEO::setTitle($service->content_1);
        SEO::setDescription(strip_tags($service->content_3));
        return view('paginas.servicio', compact('service', 'services'));
    }

    public function clientes()
    {
        SEO::setTitle('clientes');
        SEO::setDescription(strip_tags($this->data->description));
        $page = Page::where('name', 'clientes')->first();
        $sections = $page->sections;
        $section1 = $sections->where('name', 'section_1')->first()->contents()->first();
        $clients = Content::where('section_id', 11)->orderBy('order', 'ASC')->get();
        return view('paginas.clientes', compact('section1', 'clients'));
    }

    public function blog()
    {
        SEO::setTitle('blog');
        SEO::setDescription(strip_tags($this->data->description));
        $page = Page::where('name', 'blog')->first();
        $sections = $page->sections;
        $section1 = $sections->where('name', 'section_1')->first()->contents()->first();
        $posts  = $sections->where('name', 'section_2')->first()->contents()->orderBy('order', 'ASC')->get();
        return view('paginas.blog', compact('section1', 'posts'));
    }

    public function post($id)
    {
        $post = Content::findOrFail($id);
        SEO::setTitle($post->content_1);
        SEO::setDescription(strip_tags($post->content_3));
        return view('paginas.post', compact('post'));
    }



    public function cotizacion()
    {
        $page = Page::where('name', 'cotizacion')->first();
        SEO::setTitle("cotizaci&oacute;n");
        SEO::setDescription(strip_tags($this->data->description));
        return view('paginas.cotizacion');
    }

    public function contacto()
    {
        $page = Page::where('name', 'contacto')->first();
        SEO::setTitle("Contacto"); 
        SEO::setDescription(strip_tags($this->data->description));      
        return view('paginas.contacto');
    }

    public function certificado($id)
    {
        $element = Content::findOrFail($id);  
        return Response::download($element->content_3);  
    }
}
