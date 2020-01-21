<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Etudiant;
use App\Models\classe_formation;
use Illuminate\Http\Request;
use Exception;

class ClasseFormationsController extends Controller
{

    /**
     * Display a listing of the classe formations.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $classeFormations = classe_formation::with('club','etudiant')->paginate(25);

        return view('classe_formations.index', compact('classeFormations'));
    }

    /**
     * Show the form for creating a new classe formation.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $clubs = Club::pluck('name','id')->all();
$etudiants = Etudiant::pluck('name','id')->all();
        
        return view('classe_formations.create', compact('clubs','etudiants'));
    }

    /**
     * Store a new classe formation in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            classe_formation::create($data);

            return redirect()->route('classe_formations.classe_formation.index')
                ->with('success_message', 'Classe Formation was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified classe formation.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $classeFormation = classe_formation::with('club','etudiant')->findOrFail($id);

        return view('classe_formations.show', compact('classeFormation'));
    }

    /**
     * Show the form for editing the specified classe formation.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $classeFormation = classe_formation::findOrFail($id);
        $clubs = Club::pluck('name','id')->all();
$etudiants = Etudiant::pluck('name','id')->all();

        return view('classe_formations.edit', compact('classeFormation','clubs','etudiants'));
    }

    /**
     * Update the specified classe formation in the storage.
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
            
            $classeFormation = classe_formation::findOrFail($id);
            $classeFormation->update($data);

            return redirect()->route('classe_formations.classe_formation.index')
                ->with('success_message', 'Classe Formation was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified classe formation from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $classeFormation = classe_formation::findOrFail($id);
            $classeFormation->delete();

            return redirect()->route('classe_formations.classe_formation.index')
                ->with('success_message', 'Classe Formation was successfully deleted.');
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
            'etudiant_id' => 'nullable',
            'post' => 'string|min:1|nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
