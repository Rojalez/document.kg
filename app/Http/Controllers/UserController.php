<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use App\Models\Tag;
use App\Models\Npa;
use App\Models\Document;
use App\Models\Userdocument;

class UserController extends Controller
{
    public function lawyer (){

        $tags = Tag::all();
        $lawyers = User::where('lawyer',1)->simplePaginate(10);

        return view('forum.lawyers', compact('lawyers', 'tags'));
    }

    public function user ($id){
        $tags = Tag::all();
        if (Auth::check()) {
            $user = Auth::user();
            if ($id == $user->id){
                return redirect()->route('home');
            }
        }

        $user = User::findOrFail($id);

        return view('forum.user', compact('user', 'tags'));
    }

    public function change_user (Request $request){
 
        if (Auth::check()) {
                $user = Auth::user();

                if ($request->name != null){
                    $user->name = $request->name;
                }
                if ($request->lawyer === 'on'){
                    $user->lawyer = 1;
                }
                if ($request->work != null){
                    $user->work = $request->work;
                }
                if ($request->number != null){
                    $user->number = $request->number;
                }
                if ($request->email != null){
                    $user->email = $request->email;
                }
                if ($request->new_password != null){
                    $user->password = Hash::make($request->new_password);
                }
                if (!empty($request->avatar)){
                    
                    $resize = Image::make($request->avatar)->fit(450,400)->encode('jpg');

                    $hash = md5($resize->__toString());

                    $path = "{$hash}.jpg";
                    
                    $resize->save(public_path("storage/uploads/".$path));
                    if ($user->avatar != '068b7b359de277b6eea11dfa27d62ad9.jpg'){
                        if (is_file(public_path("storage/uploads/".$user->avatar))) {
                            unlink(public_path("storage/uploads/".$user->avatar));
                        }
                    }
                    

                    $user->avatar =  $path;
                }

                $user->save();
                return back()->with('success', 'Данные успешно обновлены!');
 
        }
    
    }

    public function user_delete(Request $request){

        if (Auth::check()) {
            $user = Auth::user(); 
            if ($request->type === 'document'){
                $user->documents()->detach($request->id);
                return response()->json('Документ удален из избранных!');
            } else if ($request->type === 'npa') {
                $user->npa()->detach($request->id);
                return response()->json('НПА удален из избранных!');
            } else if ($request->type === 'userdocument') {
                $userdocument = Userdocument::find($request->id);
                $userdocument->delete();
                return response()->json('Документ удален!');
            }
        }
    }


}