<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;
use Auth;
use App\Models\club_image;
use App\Models\Post;
class PostsController extends Controller
{

    /**
     * Display a listing of the posts.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::with('club','etudiant')->paginate(25);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        if(Auth::guard('etudiant')->check()){
            

$clubs = Club::where('etudiant_id',Auth::guard('etudiant')->user()->id)->get();
         }else{
        $clubs = Club::all();
    }
$etudiants = Etudiant::pluck('name','id')->all();
        
        return view('posts.create', compact('clubs','etudiants'));
    }

    /**
     * Store a new post in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        try {
            
            $data = $this->getData($request);
            
            Post::create($data);

            return redirect()->route('posts.post.index')
                ->with('success_message', 'Post was successfully added.');
        } catch (Exception $exception) {
            dd($exception);

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified post.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $post = Post::with('club','etudiant')->findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $images = club_image::where('post_id',$post->id)->get();
         if(Auth::guard('etudiant')->check()){
            

$clubs = Club::where('etudiant_id',Auth::guard('etudiant')->user()->id)->get();
         }else{
        $clubs = Club::all();
    }
$etudiants = Etudiant::pluck('name','id')->all();

        return view('posts.edit', compact('post','clubs','etudiants','images'));
    }

    /**
     * Update the specified post in the storage.
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
            
            $post = Post::findOrFail($id);
            $post->update($data);

            return redirect()->route('posts.post.index')
                ->with('success_message', 'Post was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified post from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->delete();

            return redirect()->route('posts.post.index')
                ->with('success_message', 'Post was successfully deleted.');
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
            'Titre' => 'string|min:1|nullable',
            'description' => 'string|min:1|max:1000|nullable',
            'photo' => ['file','nullable'],
            'date' => 'nullable',
            'lieu' => 'string|min:1|nullable',
            'publuc' => 'nullable',
            'etudiant_id' => 'nullable', 
        ];


        
        $data = $request->validate($rules);

        if ($request->has('custom_delete_photo')) {
            $data['photo'] = null;
        }
        if ($request->hasFile('photo')) {
            // $data['photo'] = $this->moveFile($request->file('photo'));
            $path = Storage::disk('images')->put('post', $request->file('photo'));
    // Save thumb
    $img = InterventionImage::make($request->file('photo'))->widen(100);
    Storage::disk('thumbs')->put($path, $img->encode());
    $data['photo'] = $path;
        }
        if($data['publuc']=="on"){
           $data['publuc'] = 1; 
        }else{
           $data['publuc'] = 0;  
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




          public function addimage(Request $request)
    {
       $path = Storage::disk('images')->put('', $request->file('photo'));
    // Save thumb
    $img = InterventionImage::make($request->file('photo'))->widen(100);
    Storage::disk('thumbs')->put($path, $img->encode());
    //return($path);

  $image = new club_image();
  $image->post_id = $request->post;
  $image->photo = $path;
  $image->save();

   
return($request);

    }


    public function deleteimage(Request $request)
    {

  $image= club_image::find($request->id);
  $image->delete();
   
return($request);

    }
}
