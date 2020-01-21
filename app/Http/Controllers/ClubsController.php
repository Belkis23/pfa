<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\club;
use Illuminate\Http\Request;
use Exception;

class ClubsController extends Controller
{

    /**
     * Display a listing of the clubs.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $clubs = club::with('etudiant')->paginate(25);

        return view('clubs.index', compact('clubs'));
    }

    /**
     * Show the form for creating a new club.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $etudiants = Etudiant::pluck('name','id')->all();
        
        return view('clubs.create', compact('etudiants'));
    }

    /**
     * Store a new club in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            club::create($data);

            return redirect()->route('clubs.club.index')
                ->with('success_message', 'Club was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified club.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $club = club::with('etudiant')->findOrFail($id);

        return view('clubs.show', compact('club'));
    }

    /**
     * Show the form for editing the specified club.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $club = club::findOrFail($id);
        $etudiants = Etudiant::pluck('name','id')->all();

        return view('clubs.edit', compact('club','etudiants'));
    }

    /**
     * Update the specified club in the storage.
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
            
            $club = club::findOrFail($id);
            $club->update($data);

            return redirect()->route('clubs.club.index')
                ->with('success_message', 'Club was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified club from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $club = club::findOrFail($id);
            $club->delete();

            return redirect()->route('clubs.club.index')
                ->with('success_message', 'Club was successfully deleted.');
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
            'etudiant_id' => 'nullable',
            'photo' => ['file','nullable'],
            'mombre' => 'string|min:1|nullable', 
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
