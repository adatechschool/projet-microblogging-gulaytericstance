<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Support\Facades\Redirect;
use App\Models\Post;

class PostController extends Controller
{
    //function de création 
    public function edit(Request $request, Post $post): View
    {
        return view('post.edit', [
            'post' => $request->post(),
        ]);
    }
//function de mise a jour
    public function update(PostUpdateRequest $request, Post $post): RedirectResponse
    {
        $post->fill($request->validated());
        if ($post->isDirty('description')) {
            $post->description_verified_at = null;
        }
        $post->save();

        return Redirect::route('post.edit', $post)->with('status', 'post-updated');
    }
    //function pour supprimer 
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return Redirect::route('posts.index')->with('status', "post-deleted");
    }

    //function pour lister
    public function index(): View
    {
        $posts = Post::all(); // Récupère tous les posts
       /*  die("salut"); */
       return view('post.index', compact('posts'));
    }

    //function pour stocker la nouvelle donnée
    public function store(Request $request): RedirectResponse
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
    ]);

    Post::create($validatedData);

    return Redirect::route('post.index')->with('status', 'post-created'); // Redirige vers la liste des posts après création
}

    //function pour afficher une donnée spécifique
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('post.show', compact('post'));
    }

     // Affiche le formulaire de création
     public function create(): View
     {
         return view('post.create'); // Assure-toi que cette vue existe
     }
}

