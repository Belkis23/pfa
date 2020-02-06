<?php
 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Demande_Salle;
use App\Models\Salle;
use Illuminate\Http\Request;
use Exception;
use Auth;
class DemandeSallesController extends Controller
{

    /**
     * Display a listing of the demande  salles.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
       if(Auth::guard('etudiant')->check()){
             $clubs = club::where('etudiant_id',Auth::guard('etudiant')->user()->id)->with('etudiant')->first();
             $demandeSalles = Demande_Salle::with('club','salle')->where('club_id',$clubs->id)->paginate(25);
         }else{
        $demandeSalles = Demande_Salle::with('club','salle')->paginate(25);
    }

        return view('demande__salles.index', compact('demandeSalles'));
    }

    /**
     * Show the form for creating a new demande  salle.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {

        if(Auth::guard('etudiant')->check()){
            $clubs = club::where('etudiant_id',Auth::guard('etudiant')->user()->id)->with('etudiant')->get();
        
        }else{
            $clubs = Club::all();
        }
       
$salles = Salle::pluck('name','id')->all();
        
        return view('demande__salles.create', compact('clubs','salles'));
    }

    /**
     * Store a new demande  salle in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Demande_Salle::create($data);

            return redirect()->route('demande__salles.demande__salle.index')
                ->with('success_message', 'Demande  Salle was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified demande  salle.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $demandeSalle = Demande_Salle::with('club','salle')->findOrFail($id);

        return view('demande__salles.show', compact('demandeSalle'));
    }

    /**
     * Show the form for editing the specified demande  salle.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $demandeSalle = Demande_Salle::findOrFail($id);
     if(Auth::guard('etudiant')->check()){
            $clubs = club::where('etudiant_id',Auth::guard('etudiant')->user()->id)->with('etudiant')->get();
        
        }else{
            $clubs = Club::all();
        }
$salles = Salle::pluck('name','id')->all();

        return view('demande__salles.edit', compact('demandeSalle','clubs','salles'));
    }

    /**
     * Update the specified demande  salle in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $demandeSalle = Demande_Salle::findOrFail($id);
            $demandeSalle->update($data);

            return redirect()->route('demande__salles.demande__salle.index')
                ->with('success_message', 'Demande  Salle was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified demande  salle from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $demandeSalle = Demande_Salle::findOrFail($id);
            $demandeSalle->delete();

            return redirect()->route('demande__salles.demande__salle.index')
                ->with('success_message', 'Demande  Salle was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'Club_id' => 'nullable',
            'Salle_id' => 'nullable',
            'date' => 'string|min:1|nullable',
            'Start' => 'string|min:1|nullable',
            'End' => 'string|min:1|nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

    public function confirmed(Request $request){
        $demandeSalle = Demande_Salle::findOrFail($request->id);
        $demandeSalle->confirmed = 1;
        $demandeSalle->save();
        return "treu";
    }

     public function printsale(Request $request){
        $demandeSalles = Demande_Salle::where('confirmed','=',1)->whereBetween('date', [$request->start, $request->end])->with('club','salle')->get();
       return view('demande__salles.print', compact('demandeSalles'));
    }

    

}
