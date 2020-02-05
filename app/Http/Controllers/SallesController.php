<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Salle;
use Illuminate\Http\Request;
use Exception;

class SallesController extends Controller
{

    /**
     * Display a listing of the salles.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $salles = Salle::paginate(25);

        return view('salles.index', compact('salles'));
    }

    /**
     * Show the form for creating a new salle.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('salles.create');
    }

    /**
     * Store a new salle in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Salle::create($data);

            return redirect()->route('salles.salle.index')
                ->with('success_message', 'Salle was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified salle.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $salle = Salle::findOrFail($id);

        return view('salles.show', compact('salle'));
    }

    /**
     * Show the form for editing the specified salle.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $salle = Salle::findOrFail($id);
        

        return view('salles.edit', compact('salle'));
    }

    /**
     * Update the specified salle in the storage.
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
            
            $salle = Salle::findOrFail($id);
            $salle->update($data);

            return redirect()->route('salles.salle.index')
                ->with('success_message', 'Salle was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified salle from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $salle = Salle::findOrFail($id);
            $salle->delete();

            return redirect()->route('salles.salle.index')
                ->with('success_message', 'Salle was successfully deleted.');
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
                'name' => 'string|min:1|max:255|nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
