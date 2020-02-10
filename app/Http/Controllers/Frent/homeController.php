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

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;
class homeController extends Controller
{
   

   public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        //dd($today);
        $evenment  = Demande_Evenement::where('Date','>=',$today)->where('confirmed',1)->orderBy('Date', 'ASC')->with('club')->limit(3)->get();

        foreach ($evenment as $key => $value) {
        	$value->day = Carbon::parse($value->Date)->format('d');
        	$value->month = Carbon::parse($value->Date)->format('F');
        }

        $clubs = club::limit(3)->get();


       

        return view('welcome', compact('evenment','clubs'));
    }
    public function calender()
    {
        $evenment  = Demande_Evenement::where('confirmed',1)->orderBy('Date', 'ASC')->get();
        return view('Frent.calender', compact('evenment'));
    }


    public function profile()
    {
         $evenment  = Demande_Evenement::where('confirmed',1)->orderBy('Date', 'ASC')->get();
       $etudiant = etudiant::with('classe')->findOrFail(Auth::guard('etudiant')->user()->id);
        return view('Frent.profile', compact('etudiant','evenment'));
    }

    public function updateetudin(Request $request){
           $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            
            
            
        
          
        ]);
           $etudiant = etudiant::find(Auth::guard('etudiant')->user()->id);
           $all = etudiant::all();
           foreach ($all as $key => $value) {
               if($value->id != $request->id){
                if($value->email == $request->email){
                    return back();
                }elseif($value->telephone == $request->telephone){
                    return back();
                }
               }
               
           }



            if($request->file('photo') != null){
             $path = Storage::disk('images')->put('etudiant/', $request->file('photo'));
    // Save thumb
    $img = InterventionImage::make($request->file('photo'))->widen(100);
    Storage::disk('thumbs')->put($path, $img->encode());
     $etudiant->photo = $path;
}

        
        $etudiant->name = $request->name;
        $etudiant->prenom = $request->prenom;
        $etudiant->telephone = $request->telephone;
        $etudiant->adresse = $request->adresse;
        $etudiant->email = $request->email;
        $etudiant->save();
        return back();

       
    }

    public function changepasse(Request $request){
         $this->validate($request,[
            'new_password' => ['required', 'string','min:8', 'max:255'],
            
            
            
        
          
        ]);
         $etudiant = etudiant::find(Auth::guard('etudiant')->user()->id);


         if($request->new_password == $request->repeat_new_password){
            
            if( !Hash::check($request->current_password,$etudiant->password)){
                $etudiant->password = bcrypt($request->new_password);
                $etudiant->save();
               
            }
         }
         return back();

    }


}
