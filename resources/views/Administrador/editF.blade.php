@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Editar Publicacion</div>

                <div class="card-body"> 
                  @if (session('message'))
      
                  <div class="alert alert-success">
                    {{session('message')}}  
                  </div>
                      
                  @endif
                    <form method="POST" action="{{route('Pupdate',$publicacion)}}" enctype="multipart/form-data">
                     @method('put')   
                      @csrf                      
                    <input type="hidden" class="form-control" id="id_publication" name="id_user" placeholder="" value=" {{ Auth::user()->id}}">
                          
                            
                              <div class="form-group">
                              <label for="exampleFormControlFile1">Imagen</label>
                              <br>
                              <output id="list"><img src="{{route('image',['filename'=>$publicacion->image_path])}}" alt="" width="400" height="200"></output>
                              <br>
                              <br>
                              <input type="file" id="files" name="files" class="form-control-file " value="{{ Storage::disk('publication')->get($publicacion->image_path)}}" />
                              <br>                           
                            </div>
                      
                          <div class="form-group">
                      
                            <label for="exampleFormControlInput1">Titulo</label>
                            <input type="text" class="form-control" id="tittle" name="tittle" placeholder="" value="{{$publicacion->titulo_publicacion}}">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">Contenido</label>
                            <textarea class="form-control" id="content"  name="Content" rows="20" >{!! $publicacion->contenido !!}</textarea>
                          </div>
                      
                           <input type="submit" value="subir" class="btn btn-primary">
                    


    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection