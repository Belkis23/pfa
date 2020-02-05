<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Demande_Evenement;
use Illuminate\Http\Request;
use Exception;

class DemandeEvenementsController extends Controller
{

    /**
     * Display a listing of the demande  evenements.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $demandeEvenements = Demande_Evenement::with('club')->paginate(25);

        return view('demande__evenements.index', compact('demandeEvenements'));
    }

    /**
     * Show the form for creating a new demande  evenement.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $clubs = Club::pluck('name','id')->all();
        
        return view('demande__evenements.create', compact('clubs'));
    }

    /**
     * Store a new demande  evenement in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Demande_Evenement::create($data);

            return redirect()->route('demande__evenements.demande__evenement.index')
                ->with('success_message', 'Demande  Evenement was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified demande  evenement.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $demandeEvenement = Demande_Evenement::with('club')->findOrFail($id);

        return view('demande__evenements.show', compact('demandeEvenement'));
    }

    /**
     * Show the form for editing the specified demande  evenement.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $demandeEvenement = Demande_Evenement::findOrFail($id);
        $clubs = Club::pluck('name','id')->all();

        return view('demande__evenements.edit', compact('demandeEvenement','clubs'));
    }

    /**
     * Update the specified demande  evenement in the storage.
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
            
            $demandeEvenement = Demande_Evenement::findOrFail($id);
            $demandeEvenement->update($data);

            return redirect()->route('demande__evenements.demande__evenement.index')
                ->with('success_message', 'Demande  Evenement was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified demande  evenement from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $demandeEvenement = Demande_Evenement::findOrFail($id);
            $demandeEvenement->delete();

            return redirect()->route('demande__evenements.demande__evenement.index')
                ->with('success_message', 'Demande  Evenement was successfully deleted.');
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
                'club_id' => 'nullable',
            'Name' => 'string|min:1|max:255|nullable',
            'Lieu' => 'string|min:1|nullable',
            'Date' => 'string|min:1|nullable',
            'Start' => 'string|min:1|nullable',
            'End' => 'string|min:1|nullable',
            'description' => 'string|min:1|max:1000|nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
