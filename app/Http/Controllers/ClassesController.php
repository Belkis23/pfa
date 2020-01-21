<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\classe;
use Illuminate\Http\Request;
use Exception;

class ClassesController extends Controller
{

    /**
     * Display a listing of the classes.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $classes = classe::with('section')->paginate(25);

        return view('classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new classe.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $sections = Section::pluck('name','id')->all();
        
        return view('classes.create', compact('sections'));
    }

    /**
     * Store a new classe in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            classe::create($data);

            return redirect()->route('classes.classe.index')
                ->with('success_message', 'Classe was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified classe.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $classe = classe::with('section')->findOrFail($id);

        return view('classes.show', compact('classe'));
    }

    /**
     * Show the form for editing the specified classe.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $classe = classe::findOrFail($id);
        $sections = Section::pluck('name','id')->all();

        return view('classes.edit', compact('classe','sections'));
    }

    /**
     * Update the specified classe in the storage.
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
            
            $classe = classe::findOrFail($id);
            $classe->update($data);

            return redirect()->route('classes.classe.index')
                ->with('success_message', 'Classe was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified classe from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $classe = classe::findOrFail($id);
            $classe->delete();

            return redirect()->route('classes.classe.index')
                ->with('success_message', 'Classe was successfully deleted.');
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
                'section_id' => 'nullable',
            'neveau' => 'string|min:1|nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
