<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    protected $page;

    public function __construct(){
        $this->page = Page::where('name', 'blog')->first();
    }


    public function content()
    {
        $header = Content::where('section_id', 12)->first();
        return view('administrator.blog.content', compact('header'));
    }

    public function create()
    {
        return view('administrator.blog.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/blog', 'custom');

        $content = Content::create($data);

        return redirect()->route('blog.edit', ['id' => $content->id]);
    }
    
    public function edit($id)
    {
        $content = Content::findOrFail($id);
        return view('administrator.blog.edit', compact('content'));
    }

    public function update(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/company','custom');
        }    
        
        if($request->hasFile('image2')){
            if(Storage::disk('custom')->exists($element->image2))
                Storage::disk('custom')->delete($element->image2);
            
            $data['image2'] = $request->file('image2')->store('images/company','custom');
        }   

        if($request->hasFile('image3')){
            if(Storage::disk('custom')->exists($element->image3))
                Storage::disk('custom')->delete($element->image3);
            
            $data['image3'] = $request->file('image3')->store('images/company','custom');
        }   

        $element->update($data);

        return back();
    }

    public function destroy($id)
    {
        $element = Content::find($id);
        if(Storage::disk('custom')->exists($element->image))
            Storage::disk('custom')->delete($element->image);

        $element->delete();
        return response()->json([], 200);
    }



    public function sliderGetList()
    {
        $elements = Content::where('section_id', 13)->orderBy('order', 'ASC');
        return DataTables::of($elements)
        ->editColumn('image', function($element){
            if($element->image)
                return '<img src="'.asset($element->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('actions', function($element) {
            return '<a href="'.route('blog.edit', ['id' => $element->id]).'" class="btn btn-sm btn-primary rounded-pill far fa-edit"></a><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image', 'content_2'])
        ->make(true);
    }
}
