<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Userdocument;
use App\Models\DocumentsCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DocumentsController extends Controller
{

    public function welcome () {
        $top_dogovors = Document::where('published', 1)->whereHas('category',function ($query){
            $query->where('family_category', 1);
        })->latest('created_at')->limit(5)->get();
    
            $top_zayavleniy = Document::where('published', 1)->whereHas('category',function ($query){
            $query->where('family_category', 2);
        })->latest('created_at')->limit(5)->get();
    
            $top_pril_dogovors = Document::where('published', 1)->whereHas('category',function ($query){
            $query->where('family_category', 3);
        })->latest('created_at')->limit(5)->get();
      	
      	    $doverennost = Document::where('published', 1)->whereHas('category',function ($query){
            $query->where('family_category', 20);
        })->latest('created_at')->limit(5)->get();

           
            return view('welcome', compact('top_dogovors', 'top_zayavleniy', 'top_pril_dogovors', 'doverennost'));
    }

   public function index () {
        $top_dogovors = Document::where('published', 1)->whereHas('category',function ($query){
        $query->where('family_category', 1);
    })->latest('created_at')->limit(5)->get();

        $top_zayavleniy = Document::where('published', 1)->whereHas('category',function ($query){
        $query->where('family_category', 2);
    })->latest('created_at')->limit(5)->get();

        $top_pril_dogovors = Document::where('published', 1)->whereHas('category',function ($query){
        $query->where('family_category', 3);
    })->latest('created_at')->limit(5)->get();

        $top_pril_zayavleniy = Document::where('published', 1)->whereHas('category',function ($query){
        $query->where('family_category', 4);
    })->latest('created_at')->limit(5)->get();
     
        $doverennost = Document::where('published', 1)->whereHas('category',function ($query){
        $query->where('family_category', 20);
    })->latest('created_at')->limit(5)->get();
       
        return view('documents.index', compact('top_dogovors', 'top_zayavleniy', 'top_pril_dogovors', 'top_pril_zayavleniy', 'doverennost'));
    }

   public function show ($category, $subcategory, $slug) {

        $document = Document::where('slug', $slug)->firstOrFail();

        $category = DocumentsCategory::where('slug', $category)->firstOrFail();

        $subcategory = DocumentsCategory::where('slug', $subcategory)->firstOrFail();

        return view('documents.show', compact('document', 'category', 'subcategory'));
    }

    public function category ($category) {
        $subcategories = DocumentsCategory::whereHas('family_category', function ($query) use ($category){
            $query->where('slug', $category);
        })->get();

        $category = DocumentsCategory::where('slug', $category)->firstOrFail();

        return view('documents.category', compact('subcategories', 'category'));
    }

    public function subcategory ($category, $subcategory) {
        $documents = Document::where('published', 1)->whereHas('category', function ($query) use ($subcategory){
            $query->where('slug', $subcategory);
        })->get();
        
        $category = DocumentsCategory::where('slug', $category)->firstOrFail();

        $subcategory = DocumentsCategory::where('slug', $subcategory)->firstOrFail();

        return view('documents.subcategory', compact('subcategory', 'category', 'documents'));
    }

        //document-v-izbrannoe
        public function document_v_izbrannoe(Request $request){
            if (Auth::check()) {
                $user = Auth::user();
                $id = $request->id;
                $exist = $user->whereHas('documents', function ($query) use ($id) {
                    $query->where('document_id', $id);
                })->exists();
    
                if (!$exist) {
                    $user->documents()->attach($request->id);
                    return response()->json('Документ успешно добавлен в избранное!');
                } else {
                    return response()->json('Документ уже в избранном!');
                }
            }
        }

        //Сохранить документ
        public function document_save(Request $request){
            if (Auth::check()) {
                $user = Auth::user();
                
                $userdocument = new Userdocument;
                
                $userdocument->user_id= $user->id;
                $userdocument->name= $request->name;
                $userdocument->content= $request->content;
                $userdocument->radioblock= $request->radioblock;
                $userdocument->save();

                return response()->json('Документ сохранен!');
            }
        }

        //Сохранить документ
        public function document_resave(Request $request){
            if (Auth::check()) {
                $user = Auth::user();
                
                $userdocument = Userdocument::findOrFail($request->id);

                $userdocument->name= $request->name;
                $userdocument->content= $request->content;
                $userdocument->radioblock= $request->radioblock;
                $userdocument->save();

                return response()->json('Документ сохранен!');
            }
        }





}