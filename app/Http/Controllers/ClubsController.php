<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\club;
use Illuminate\Http\Request;
use Exception;
use Spatie\Permission\Models\Permission;
use Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;
class ClubsController extends Controller
{

    /**
     * Display a listing of the clubs.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {

         if(Auth::guard('etudiant')->check()){
             $clubs = club::where('etudiant_id',Auth::guard('etudiant')->user()->id)->with('etudiant')->paginate(25);
         }else{
            $clubs = club::with('etudiant')->paginate(25); 
         }
       

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
            $data['mombre']= 1;
            
         $club = club::create($data);
         $etudiants = Etudiant::find($request->etudiant_id);
         $president = Permission::where('name','president')->get();
         $etudiants->givePermissionTo($president);


            return redirect()->route('clubs.club.index')
                ->with('success_message', 'Club was successfully added.');
        } catch (Exception $exception) {
dd($exception);
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
            // $data['photo'] = $this->moveFile($request->file('photo'));
            $path = Storage::disk('images')->put('club/', $request->file('photo'));
    // Save thumb
    $img = InterventionImage::make($request->file('photo'))->widen(100);
    Storage::disk('thumbs')->put($path, $img->encode());
    $data['photo'] = $path;
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
