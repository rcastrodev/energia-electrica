<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use App\VariableContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    protected $page;

    public function __construct(){
        $this->page = Page::where('name', 'servicios')->first();
    }


    public function content()
    {
        $header = Content::where('section_id', 8)->first();
        return view('administrator.services.content', compact('header'));
    }

    public function create()
    {
        return view('administrator.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/services', 'custom');

        if ($request->hasFile('image2'))
            $data['image2'] = $request->file('image2')->store('images/services', 'custom');

        if ($request->hasFile('image3'))
            $data['image3'] = $request->file('image3')->store('images/services', 'custom');

        if ($request->hasFile('image4'))
            $data['image4'] = $request->file('image4')->store('images/services', 'custom');

        $content = Content::create($data);

        return redirect()->route('service.edit', ['id' => $content->id]);
    }
    
    public function edit($id)
    {
        $content = Content::findOrFail($id);
        return view('administrator.services.edit', compact('content'));
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

        if($request->hasFile('image4')){
            if(Storage::disk('custom')->exists($element->image4))
                Storage::disk('custom')->delete($element->image4);
            
            $data['image4'] = $request->file('image4')->store('images/company','custom');
        }   

        $element->update($data);

        return back();
    }

    public function destroy($id)
    {
        $element = Content::find($id);
        if(Storage::disk('custom')->exists($element->image))
            Storage::disk('custom')->delete($element->image);

        if(Storage::disk('custom')->exists($element->image2))
            Storage::disk('custom')->delete($element->image2);

        if(Storage::disk('custom')->exists($element->image3))
            Storage::disk('custom')->delete($element->image3);

        if(Storage::disk('custom')->exists($element->image4))
            Storage::disk('custom')->delete($element->image4);

        $element->delete();
        return response()->json([], 200);
    }



    public function sliderGetList()
    {
        $elements = Content::where('section_id', 9)->orderBy('order', 'ASC');
        return DataTables::of($elements)
        ->editColumn('image', function($element){
            if($element->image)
                return '<img src="'.asset($element->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('actions', function($element) {
            return '<a href="'.route('service.edit', ['id' => $element->id]).'" class="btn btn-sm btn-primary rounded-pill far fa-edit"></a><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image', 'content_2'])
        ->make(true);
    }

    public function getCaracteristicas(Request $request)
    {
        $elements = VariableContent::where('content_id', $request->input('element'))->orderBy('order', 'ASC');
        return DataTables::of($elements)
        ->editColumn('image', function($element){
            return '<img src="'.asset($element->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findCaracteristica('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="variableDestroy('.$element->id.')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image', 'content_2'])
        ->make(true);   
    }
}
