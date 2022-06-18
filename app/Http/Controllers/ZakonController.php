<?php

namespace App\Http\Controllers;

use App\Models\Npa;
use App\User;
use App\Models\Organ;
use App\Models\Npacategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZakonController extends Controller
{

    // npa glavnaya
    public function index(Request $request, Npa $npa){
        
        if ($request->has('smartSearch')) {
            $npa = Npa::search($request->smartSearch)->get();
            $links = false;
        } else {
            $npa = $npa->getNpaBySearch($request)->orderBy('id', 'desc')->simplePaginate(10)->appends(request()->query());
            $links = true;
        }

        $npacategory = Npacategory::all();
        $organy = Organ::all();

        return view('zakon.index', compact('npa', 'npacategory', 'organy', 'links'));
    }

    // npa pokaz
    public function show($id){
        $zakon = Npa::findOrFail($id);
        return view('zakon.show', compact('zakon'));
    }

    //npa-v-izbrannoe
    public function npa_v_izbrannoe(Request $request){
        if (Auth::check()) {
            $user = Auth::user();
            $id = $request->id;
            $exist = $user->whereHas('npa', function ($query) use ($id) {
                $query->where('npa_id', $id);
            })->exists();

            if (!$exist) {
                $user->npa()->attach($request->id);
                return response()->json('Файл успешно добавлен в избранное!');
            } else {
                return response()->json('Файл уже в избранном!');
            }
        }
    }

    //npa-iz-izbrannogo
    public function npa_iz_izbrannogo(Request $request){
        if (Auth::check()) {
            $user = Auth::user();
            $id = $request->id;
            $exist = $user->whereHas('npa', function ($query) use ($id) {
                $query->where('npa_id', $id);
            })->exists();

            if ($exist) {
                $user->npa()->detach($request->id);
                return response()->json('Файл больше не в избранном!');
            } else {
                return response()->json('Файл больше не в избранном!');
            }
        }
    }

    // poisk na stranise show
    public function search_on_show(Request $request){
        $zakony = Npa::search($request->text)->get();
        
        if ($zakony->count()){
            $npa_links = '';
            foreach ($zakony as $zakon) {
                $npa_links.= "<a href='#' class='href-on-show' data-id='$zakon->id'><p>$zakon->name</p></a>";
            }
            
        }
        else {
            $npa_links = '<p>По вашему запросу "'.$request->text.'" ничего не найдено. Проверьте правильность запроса и попробуйте ещё раз.';
        }
        return response()->json($npa_links);
    }

    // npa - izbrannoe
    public function npa_izbrannoe(Request $request){
        if (Auth::check()) {
            $user = Auth::user();
            $zakony = $user->npa()->get();
        
            if ($zakony->count()){
            $npa_links = '<b><p>Избранные:</p></b>';
            foreach ($zakony as $zakon) {
                $npa_links.= "<a href='#' class='href-on-show' data-id='$zakon->id'><p>$zakon->name</p></a>";
            }
            
            } else {
            $npa_links = '<b><p>У вас нет избранных документов</p></b>';
            }
        return response()->json($npa_links);
        }
    }

    //otvet na poisk na stranitse show
    public function npa_show (Request $request){
        $npa = Npa::find($request->id);
        return response()->json($npa);
    }

    //parsing po bas
    public function get_document(Request $request){
        if (!Npa::where('id', $request->id)->exists()){
            $npa = new Npa;
            $npa->id = $request->id;
            $npa->name = $request->name;
            $npa->content = $this->change_href($request->content);
            $npa->npacategory_id = $request->category;
            if ($request->status != null){
            $npa->status = $request->status;
            }
            if ($request->data_submit != null){
            $npa->data_submit = date("Y-m-d", strtotime($request->data_submit));
            }
            $organs = $this->get_organ($request->organ);
            $npa->save();
            if ($organs != null){
            $npa = Npa::find($request->id);
            foreach ($organs as $organ) {
                $npa->organ()->attach($organ);
                }
            }
        }
    }

    //zamena ssylok pri parsinge po bas
    public function change_href ($content){

        $dom = new \DOMDocument();
        $content = mb_convert_encoding($content, 'HTML-ENTITIES', 'utf-8');
        $dom->loadHTML($content);

        foreach ($dom->getElementsByTagName('a') as $item) {
            $firstHref = $item->getAttribute('href');
            $explodedHref = explode('/', $firstHref);
            if (isset($explodedHref[4])){
                $code = explode('?', $explodedHref[4]);
                $hrefToThisPage = explode('#', $explodedHref[4]);
                if (isset($hrefToThisPage[1])){
                    $href = $code[0].'#'.$hrefToThisPage[1];
                } else {
                    $href = $code[0];
                }
                $item->setAttribute('href', "/zakon".'/'.$href);
            }
        }

        foreach ($dom->getElementsByTagName('img') as $item){
            $item->setAttribute('src', '/img/gerb.jpg');
            $item->setAttribute('alt', 'Герб');
            $item->setAttribute('id', 'gerb');
        }
        
        $content = $dom->saveHTML();
        return $content;
    }

    //poluchenie vseh vidov organov pri parsinge po bas
    public function get_organ ($organ){
        $dom = new \DOMDocument();
        $organ = mb_convert_encoding($organ, 'HTML-ENTITIES', 'utf-8');
        $dom->loadHTML($organ);
        $organs = [];
        foreach ($dom->getElementsByTagName('li') as $item){
            $organName = trim($item->nodeValue);
            if (Organ::where('name', $organName)->exists()) {
                $organ = Organ::where('name', $organName)->first();
                $organs[] = $organ->id;
             } else {
                $organ = new Organ;
                $organ->name = $organName;
                $organ->save();
                $organs[] = $organ->id;
             }
        }
        return $organs;
    }

}
