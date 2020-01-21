<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Etudiant;
use App\Models\membre_club;
use Illuminate\Http\Request;
use Exception;

class MembreClubsController extends Controller
{

    /**
     * Display a listing of the membre clubs.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $membreClubs = membre_club::with('etudiant','club')->paginate(25);

        return view('membre_clubs.index', compact('membreClubs'));
    }

    /**
     * Show the form for creating a new membre club.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $etudiants = Etudiant::pluck('name','id')->all();
$clubs = Club::pluck('name','id')->all();
        
        return view('membre_clubs.create', compact('etudiants','clubs'));
    }

    /**
     * Store a new membre club in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            membre_club::create($data);

            return redirect()->route('membre_clubs.membre_club.index')
                ->with('success_message', 'Membre Club was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified membre club.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $membreClub = membre_club::with('etudiant','club')->findOrFail($id);

        return view('membre_clubs.show', compact('membreClub'));
    }

    /**
     * Show the form for editing the specified membre club.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $membreClub = membre_club::findOrFail($id);
        $etudiants = Etudiant::pluck('name','id')->all();
$clubs = Club::pluck('name','id')->all();

        return view('membre_clubs.edit', compact('membreClub','etudiants','clubs'));
    }

    /**
     * Update the specified membre club in the storage.
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
            
            $membreClub = membre_club::findOrFail($id);
            $membreClub->update($data);

            return redirect()->route('membre_clubs.membre_club.index')
                ->with('success_message', 'Membre Club was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified membre club from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $membreClub = membre_club::findOrFail($id);
            $membreClub->delete();

            return redirect()->route('membre_clubs.membre_club.index')
                ->with('success_message', 'Membre Club was successfully deleted.');
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
                'etudiant_id' => 'nullable',
            'club_id' => 'nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
