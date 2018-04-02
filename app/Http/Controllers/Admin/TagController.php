<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Request\TagStoreRequest;
use App\Http\Request\TagUpdateRequest;

use App\Tag;



class TagController extends Controller{

    /**
     * Class Constructor
     */
    // public function __construct() {
    //     $this->middleware('auth');
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $tags = Tag::orderBy('id', 'DESC')
                   ->paginate();

        dd($tags);

        return view('admin.tag.index_tag', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.tag.create_tag');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequest $request){

        //Vaidation
        $tag = Tag::create($request->all());

        return redirect()->route('admin.tag.update_tag', $tag->id)->with('info', 'Etiqueta creada con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $tag = Tag::find($id);

        return view('admin.tags.read_tag', compact('$tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $tag = Tag::find($id);

        return view('admin.tags.update_tag', compact('$tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdateRequest $request, $id){
        $tag = Tag::find($id);
        //Vaidation
        $tag->fill($request->all())
            ->save();

        return redirect()->route('admin.tag.update_tag', $tag->id)->with('info', 'Etiqueta actualizada con Éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $tag = Tag::find($id)->delete();

        return back()->with('info', "Elimanada correctamente la etiqueta: $tag");
    }
}
