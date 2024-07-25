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
            'post' => $post,
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
}