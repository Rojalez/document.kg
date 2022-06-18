<?php

namespace App\Http\Controllers;
use App\Models\Npa;
use App\Models\Document;
use App\Models\Question;
use Illuminate\Http\Request;


class SitemapController extends Controller
{
    public function sitemap() {
        $npa = Npa::pluck('id');
        $documents = Document::all();
        $questions = Question::pluck('slug');
        return response()->view('sitemap.index', compact('npa', 'documents', 'questions'))->header('Content-Type', 'text/xml');
    }


}


