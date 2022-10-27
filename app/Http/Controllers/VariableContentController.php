<?php

namespace App\Http\Controllers;

use App\VariableContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VariableContentController extends Controller
{

    public function getElement($id)
    {
        $content = VariableContent::find($id);
        return response()->json(['content' => $content]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
    
        if ($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/variable-content', 'custom');

        VariableContent::create($data);
    
        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $element = VariableContent::find($request->input('id'));
        $data = $request->all();
    
        if ($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);

            $data['image'] = $request->file('image')->store('images/variable-content', 'custom');
        }
            
        $element->update($data);
    
        return response()->json([], 201);
    }

    public function destroy($id)
    {
        $element = VariableContent::find($id);
        if(Storage::disk('custom')->exists($element->image))
            Storage::disk('custom')->delete($element->image);

        $element->delete();
        return response()->json([], 200);
    }
}
