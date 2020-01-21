<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\section;
use Illuminate\Http\Request;
use Exception;

class SectionsController extends Controller
{

    /**
     * Display a listing of the sections.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $sections = section::paginate(25);

        return view('sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new section.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('sections.create');
    }

    /**
     * Store a new section in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            section::create($data);

            return redirect()->route('sections.section.index')
                ->with('success_message', 'Section was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified section.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $section = section::findOrFail($id);

        return view('sections.show', compact('section'));
    }

    /**
     * Show the form for editing the specified section.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $section = section::findOrFail($id);
        

        return view('sections.edit', compact('section'));
    }

    /**
     * Update the specified section in the storage.
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
            
            $section = section::findOrFail($id);
            $section->update($data);

            return redirect()->route('sections.section.index')
                ->with('success_message', 'Section was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified section from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $section = section::findOrFail($id);
            $section->delete();

            return redirect()->route('sections.section.index')
                ->with('success_message', 'Section was successfully deleted.');
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
