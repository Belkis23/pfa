<?php

namespace App\Http\Controllers\Frent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Demande_Evenement;
use Carbon\Carbon;
use App\Models\club;
use Auth;
use Hash;
use App\Models\etudiant;
use App\Models\classe_formation;
use App\Models\Post;
use App\Models\membre_club;
use App\Models\club_image;

class clubController extends Controller
{
    public function index()
    {
         $clubs = club::with('etudiant')->paginate(5); 

        return view('Frent.allclub', compact('clubs'));
    }

    public function show($id)
    {
        $club = club::find($id);
         $etudiant = Etudiant::find($club->etudiant_id);
         $club->mombre = 0;
        //dd($today);


//$images = club_image::where('post_id',$club->id)->get();

        
         if(Auth::guard('etudiant')->check()){
         	 $membreClub = membre_club::where('club_id',$club->id)->where('etudiant_id',Auth::guard('etudiant')->user()->id)->first();
         	if($membreClub != null){
         		$posts = Post::where('club_id',$club->id)->orderBy('date', 'ASC')->with('club','etudiant')->paginate(5);
         		$club->mombre = 1;

         	}else{
         		$posts = Post::where('club_id',$club->id)->where('publuc',1)->orderBy('date', 'ASC')->with('club','etudiant')->paginate(5);

         	}
         }else{
         		$posts = Post::where('club_id',$club->id)->where('publuc',1)->orderBy('date', 'ASC')->with('club','etudiant')->paginate(5);

         	}
        $evenements  = Demande_Evenement::where('club_id',$club->id)->where('confirmed',1)->orderBy('date', 'ASC')->with('club')->paginate(5);
        

        foreach ($evenements as $key => $value) {
        	$value->day = Carbon::parse($value->date)->format('d');
        	$value->month = Carbon::parse($value->date)->format('F');
        }

         $classeFormations = classe_formation::where('club_id',$club->id)->with('club','etudiant')->get();


 foreach ($posts as $key => $valu) {
        	$valu->day = Carbon::parse($valu->date)->format('d');
        	$valu->month = Carbon::parse($valu->date)->format('F');
        }
        


          

    

        return view('Frent.club', compact('evenements','club','etudiant','classeFormations','posts'));
    }

    public function post($id){
         $post = Post::with('club','etudiant')->findOrFail($id);

        $images = club_image::where('post_id',$id)->get();
       
         return view('Frent.post', compact('post','images'));
    }
}
