<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\etudiant;
use Illuminate\Http\Request;
use Exception;

class EtudiantsController extends Controller
{

    /**
     * Display a listing of the etudiants.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $etudiants = etudiant::with('classe')->paginate(25);

        return view('etudiants.index', compact('etudiants'));
    }

    /**
     * Show the form for creating a new etudiant.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $classes = Classe::pluck('created_at','id')->all();
        
        return view('etudiants.create', compact('classes'));
    }

    /**
     * Store a new etudiant in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            etudiant::create($data);

            return redirect()->route('etudiants.etudiant.index')
                ->with('success_message', 'Etudiant was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified etudiant.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $etudiant = etudiant::with('classe')->findOrFail($id);

        return view('etudiants.show', compact('etudiant'));
    }

    /**
     * Show the form for editing the specified etudiant.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $etudiant = etudiant::findOrFail($id);
        $classes = Classe::pluck('created_at','id')->all();

        return view('etudiants.edit', compact('etudiant','classes'));
    }

    /**
     * Update the specified etudiant in the storage.
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
            
            $etudiant = etudiant::findOrFail($id);
            $etudiant->update($data);

            return redirect()->route('etudiants.etudiant.index')
                ->with('success_message', 'Etudiant was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified etudiant from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $etudiant = etudiant::findOrFail($id);
            $etudiant->delete();

            return redirect()->route('etudiants.etudiant.index')
                ->with('success_message', 'Etudiant was successfully deleted.');
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
            'prenom' => 'string|min:1|nullable',
            'cin' => 'string|min:1|nullable',
            'telephone' => 'string|min:1|nullable',
            'adresse' => 'string|min:1|nullable',
            'classe_id' => 'nullable',
            'email' => 'nullable',
            'password' => 'nullable',
            'photo' => ['file','nullable'], 
        ];

        
        $data = $request->validate($rules);

        if ($request->has('custom_delete_photo')) {
            $data['photo'] = null;
        }
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->moveFile($request->file('photo'));
        }



        return $data;
    }
  
    /**
     * Moves the attached file to the server.
     *
     * @param Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return string
     */
    protected function moveFile($file)
    {
        if (!$file->isValid()) {
            return '';
        }
        

        $path = config('laravel-code-generator.files_upload_path', 'uploads');
        $saved = $file->store('public/' . $path, config('filesystems.default'));

        return substr($saved, 7);
    }
}
