<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

class postController extends Controller
{
    public function index() {
        return view('post.index', [
            'posts' => post::orderby('created_at', 'asc')->paginate(6)
        ]);
    }

    public function create() {
        return view('post.create');
    }



    public function store() {


        $data = request()->validate([
            'title' => ['required', 'min:1', 'max:255'],
            'subject' => ['required', 'min:1', 'max:255', 'unique:posts,subject'],
            'content' => ['required', 'min:1'],
            'file' => ['required', 'mimes:jpg,png,jpeg', 'max:5048'],
        ]);

        function insert(Request $request){
            $request->validate([
                'file' => ['required', 'mimes:jpg,png,jpeg', 'max:5048'],
            ]);

            $file = $request->file('file');
            $file->move('images', $file->getClientOriganalName());
            $file_name = $file->getClientOriganalName();

            $insert = new post();
            $insert->file = $file_name;
            $insert->save();
        }


        // $newImageName = time() . '-' . $data = request()->title . '-' . $data = request()->file->extension();

        // $data = request()->file->move(public_path('images'), $newImageName);

        $data['user_id'] = Auth::user()->id;
        
        $post = post::create($data);


        return redirect()->route('post');
    }

    public function show(post $post) 
    {
        return view('post.show', [ 
            'post' => $post]);
    }

    public function edit(post $post){
        return view('post.edit', [
            'post' => $post
        ]);
    }

    public function update(post $post) {
        $data = request()->validate([
            'title' => ['required', 'min:1', 'max:255'],
            'subject' => ['required', 'min:1', 'max:255'],
            'content' => ['required', 'min:1'],
            'file' => ['required', 'min:1', 'max:5048'],
        ]);

        $post->update($data);

        return redirect()->route('showPost', [$post->id]);

    }

    public function delete(post $post) {
        

        if(!isEmpty($post->comments))$post->comments->delete();
        if(!isEmpty($post->attachments))$post->attachments->delete();
        $post->delete();
    }

    public function like(post $post) 
    {
        $post->like +=1;
        $post->update();
        return redirect()->route('showPost', $post);
    }

    public function dislike(post $post) 
    {
        $post->dislike +=1;
        $post->update();
        return redirect()->route('showPost', $post);
    }
}
