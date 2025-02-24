<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Facade\FlareClient\View;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {

        /* $newPost=new Post;
        $newPost->title='new Post';
        $newPost->content='new Post content';
        $newPost->short_content='new Post short content';
        $newPost->photo='post.jpg';

        $newPost=Post::create([
            'title'=>'5',
            'short_content'=>'short',
            'content'=>'content 123',
            'photo'=>'photo.jpg'
        ]);
    

        $post=Post::where('id',4)->first();

       $post->delete();
      

      Post::withTrashed()->find(3)->restore();

      $posts=Post::all();

      dd($posts);


       return 'deleted';
        */

        $posts = Post::latest()->paginate(6);



        return view('posts.index')->with('posts', $posts);
    }


    public function create()
    {
        return View('posts.create');
    }


    public function store(StorePostRequest $request)
    {
        // Bir nechta fayllarni yuklash va saqlash
        $photos = [];
        if ($request->hasFile('photo')) {
            foreach ($request->file('photo') as $file) {
                $name = $file->getClientOriginalName();
                $path = $file->storeAs('post-photos', $name, 'public');
                $photos[] = $path;
            }
        }
    
        // Post yaratish
        Post::create([
            'name' => $request->name,
            'year' => $request->year,
            'road' => $request->road,
            'karopka' => $request->karopka,
            'about_car' => $request->about_car,
            'photo' => json_encode($photos), // Rasm yo'llarini JSON formatda saqlaymiz
            'tan_narx' => $request->tan_narx,
        ]);
    
        return redirect()->route('posts.index');
    }
    


    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }


    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }


    public function update(StorePostRequest $request, Post $post)
    {
        $photos = json_decode($post->photo) ?? [];
    
        // Yangi fayllarni yuklash
        if ($request->hasFile('photo')) {
            // Eski rasmlarni o‘chirish
            foreach ($photos as $photoPath) {
                Storage::disk('public')->delete($photoPath);
            }
            $photos = []; // Yangi yuklangan rasmlar uchun bo‘sh massiv
            foreach ($request->file('photo') as $file) {
                $name = $file->getClientOriginalName();
                $path = $file->storeAs('post-photos', $name, 'public');
                $photos[] = $path;
            }
        }
    
        // Post ma’lumotlarini yangilash
        $post->update([
            'name' => $request->name,
            'year' => $request->year,
            'road' => $request->road,
            'karopka' => $request->karopka,
            'about_car' => $request->about_car,
            'photo' => json_encode($photos), // Yangi rasm yo'llarini JSON formatda saqlash
            'tan_narx' => $request->tan_narx,
        ]);
    
        return redirect()->route('posts.show', ['post' => $post->id]);
    }
    


    public function destroy(Post $post)
    {
        if (isset($post->photo)) {
            Storage::delete($post->photo);
        }
        $post->delete();

        return redirect()->route('posts.index');
    }
}
