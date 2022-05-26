<?php

namespace App\Http\Controllers\Dashboard;

//use Illuminate\Support\Str;
//use Illuminate\Support\Facades\Validator;
//use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate('2');
        return view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('id', 'title');
        $post = new Post();

        //dd($categories);

        echo view('dashboard.post.create', compact('categories', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        //$validated = $request->validate(StoreRequest::myRules());
        //dd($validated);
        //$validated = Validator::make($request->all(), StoreRequest::myRules());
        //dd($validated->fails());

        //echo request("title");
        //dd( $request );
        //echo "Store";

        //$data = array_merge($request->all(), ['image' => '']);
        
        //dd($data);

        // $data = $request->Validated();
        // $data['slug'] = Str::slug($data['title']);
        // dd($data);

        Post::create($request->Validated());

        return to_route("post.index")->with('status',"Registro creado.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("dashboard.post.show", compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');

        return view('dashboard.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();

        if(isset($data['image'])){

            $data['image'] = $filename = time().".".$data["image"]->extension();
            $request->image->move(public_path("image"), $filename);

        }
        
        $post->update($data);
        //$request->session()->flash('status', "Registro actualizado.");
        return to_route("post.index")->with('status',"Registro actualizado.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route("post.index")->with('status',"Registro eliminado.");
    }
}
