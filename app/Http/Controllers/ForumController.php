<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Tag;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ForumController extends Controller
{
    public function index(){

        $tags = Tag::all();
        $questions = Question::orderBy('id', 'desc')->simplePaginate(10);
        $top_lawyers = User::where('lawyer',1)->orderBy('score', 'desc')->take(5)->get();

        return view('forum.index', compact('questions', 'top_lawyers', 'tags'));
    }

    public function show($slug){

        $tags = Tag::all();
        $question = Question::where('slug',$slug)->firstOrFail();

        return view('forum.show', compact('question', 'tags'));
    }

    public function create_question_post(Request $request){
        $question = new Question;

        if (Auth::check()) {
            $user = Auth::user();
            $question->user_id = $user->id;
        } else {
            $question->user_id = 0;
        }

        $question->question = $request->question;

        $question->text = $request->text;

        $question->slug = Str::slug($request->question, '-');

        $question->save();
        
        if ($request->tags != null) {
            foreach ($request->tags as $tag_id) {
                $tags = Tag::find($tag_id);
                $tags->question()->attach($question->id);
            }
        }


        return redirect()->route('forum-discission', ['slug' => $question->slug])->with('success', 'Ваш вопрос опубликован! Спасибо, за доверие!');
    }

    public function answer(Request $request){
        $answer = new Answer;
        if (Auth::check()) {
            $user = Auth::user();
            $answer->user_id = $user->id;
            $user_name = $user->name;
        } else {
            $answer->user_id = 0;
            $user_name = 'Гость';
        }


        $answer->text = $request->text;

        $answer->question_id = $request->question_id;

        $answer->save();

        if (Auth::check()) {
            $user->score = $user->answers()->count();
            $user->save();
        }

        return response()->json(['answer'=>$answer, 'username'=>$user_name]);
    }

    public function answers($id){

        $tags = Tag::all();
        $user = User::find($id);
        return view('forum.answers', compact('user', 'tags'));

    }
}
