<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Share;
class ShareController extends Controller
{
 
    public function details($slug = null){
        
        $share = Share::where('slug','=',$slug)->get()[0];

        return view("share",compact('share'));
    
    }

    public function post(Request $request){
        $this->middleware("auth");
        $slug = "";
        $share = new Share;
        $share->title = $request->title;
        $share->description = $request->description;
        $slug = $this->slugify($request->title);
        $share->slug = $slug;
        $fileName = $slug .".".$request->file->getClientOriginalExtension();
        $request->file('file')->move(public_path("share"),$fileName);
        $share->file = $fileName;
        if($share->save()){
            return redirect("share-information/".$slug);
        }

        return 0;
    }
    public function slugify($text)
    {
    //ingilizce karakter olmayan şeyleri - ile değiştirelim
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // karakter dilini değiştirelim
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // istenmeyen karakterleri götürüyoruz.
    $text = preg_replace('~[^-\w]+~', '', $text);

    // kırpalım
    $text = trim($text, '-');

    // remove tekrarları siliyoruz (-)
    $text = preg_replace('~-+~', '-', $text);

    // küçük harf yapıyoruz
    $text = strtolower($text);

    if (empty($text)) {
    return 'n-a';
    }

    return $text . time();
    }

}
