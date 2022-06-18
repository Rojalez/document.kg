<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Npa;
use App\Models\DocumentsCategory;
use Illuminate\Support\Str;

class AdminController extends Controller
{
   public function document_show ($category, $subcategory, $slug) {

        $document = Document::where('slug', $slug)->first();

        $category = DocumentsCategory::where('slug', $category)->first();

        $subcategory = DocumentsCategory::where('slug', $subcategory)->first();

        return view('admin.documents.show', compact('document', 'category', 'subcategory'));
    }

    public function save_document(Request $request) {
        $document = Document::find($request->id);
        $document->content = $request->content;
        $document->radioblock = $request->radioblock;
        $document->save();

        return response()->json(['success'=>'Document saved']);
     }

     public function create_document_get() {
        $categories = DocumentsCategory::whereNotNull('family_category')->get();
        
        return view('admin.documents.create-document', compact('categories'));
     }

     public function create_document(Request $request) {
        $document = new Document;
        $document->name = $request->name;
        $document->slug = Str::slug($request->name, '-');
        $document->category_id = $request->category;

        if ($request->example != null && Document::where('slug', $request->example)->exists()) {

            $example = Document::where('slug', $request->example)->first();
            $document->radioblock = $example->radioblock;
            $document->content = $example->content;
        }

        $document->save();

        return redirect()->route('admin-documents-show', ['category' => $document->category()->first()->family_category()->first()->slug,'subcategory' => $document->category()->first()->slug,'slug' => $document->slug ]);
     }

         // npa pokaz
    public function zakon_show($id){
      $zakon = Npa::findOrFail($id);
      return view('admin.zakon.show', compact('zakon'));
  }

  //npa save
  public function save_npa(Request $request) {
   $document = Npa::find($request->id);
   $document->content = $request->content;
   $document->save();

   return response()->json(['success'=>'Document saved']);
}






}