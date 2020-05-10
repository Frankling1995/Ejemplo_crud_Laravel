<?php

namespace App\Http\Controllers;

use App\Puclicaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
class PuclicacionesController extends Controller
{

    public function __construct()
    {
    $this->middleware('auth',['except'=>['show','index']]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Administrador.createP');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $publication= new Puclicaciones;  
        $image_path=$request->file('files');
        if ($image_path) {
            $image_path_name=time().$image_path->getClientOriginalName();
            Storage::disk('publication')->put($image_path_name,File::get($image_path));
        }
        $values=[
            'image_path'=> $image_path_name,
            'titulo_publicacion'=> $request->input('tittle'),
            'contenido'=> $request->input('Content'),             
            'user_id'=>$request->input('id_user')
                ]   ;
        $publication->create($values);
        return  redirect()->route('Pcrear')->with(['message'=>'Datos guardados Satisfactoriamente ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Puclicaciones  $puclicaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Puclicaciones $puclicaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Puclicaciones  $puclicaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
    
        $titulo=$request->input('titulo');
        $publicaciones= Puclicaciones::orderBy('id','DESC')->titulo($titulo)->paginate(2);


        return view('Administrador.editP',compact('publicaciones'));
    }

    public function formedit(Puclicaciones $publicacion)
    {
        
       return view('Administrador.editF',compact('publicacion'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Puclicaciones  $puclicaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Puclicaciones $publicacion)
    {
        $image_path=$request->file('files');
        if ($image_path==null) {
            $publicacion->titulo_publicacion= $request->input('tittle');
            $publicacion->contenido=$request->input('Content');
            $publicacion->save();
        } else {
            $publicacion->titulo_publicacion= $request->input('tittle');
            $publicacion->contenido=$request->input('Content');
            if ($image_path) {
                $image_path_name=time().$image_path->getClientOriginalName();
                Storage::disk('publication')->put($image_path_name,File::get($image_path));
            }
            $publicacion->image_path=$image_path_name;
            $publicacion->save();
        }
        
        return  redirect()->route('FPedit',$publicacion)->with(['message'=>'Datos actualizados Satisfactoriamente ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Puclicaciones  $puclicaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Puclicaciones $publicacion)
    {
        
    $publicacion->delete();
    return  redirect()->route('Pedit');
    }



    public function getImage($filename){
        $file=Storage::disk('publication')->get($filename);
        return new Response($file,200);
    }

}
