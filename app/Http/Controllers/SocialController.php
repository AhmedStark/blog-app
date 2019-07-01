<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Social;
class SocialController extends Controller
{
    public function updateLinks(Request $request){

        $links=[
            'facebook'=>$request->facebook,
            'twitter'=> $request->twitter,
            'linkedin'=>$request->linkedin,
            'instagram'=>$request->insta,
        ];
        
        foreach (array_keys($links) as $i){
            Social::where('site',$i)->update(['link' => $links[$i]]);
            
        }
        return redirect("/")->with(['response'=>'Update complete']);
    }
    
}
