@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Crear Publicacion</div>

                <div class="card-body"> 
                  @if (session('message'))
      
                  <div class="alert alert-success">
                    {{session('message')}}  
                  </div>
                      
                  @endif
                    <form method="POST" action="{{route('Psave')}}" enctype="multipart/form-data">
                        @csrf    
                        
                        <input type="hidden" class="form-control" id="id_publication" name="id_user" placeholder="" value=" {{ Auth::user()->id}}">
                        
                    
                        
                            
                              <div class="form-group">
                              <label for="exampleFormControlFile1">Imagen</label>
                              <br>
                              <output id="list"></output>
                              <br>
                              <br>
                              <input type="file" id="files" name="files" class="form-control-file " />
                              <br>                           
                            </div>
                      
                          <div class="form-group">
                      
                            <label for="exampleFormControlInput1">Titulo</label>
                            <input type="text" class="form-control" id="tittle" name="tittle" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">Contenido</label>
                            <textarea class="form-control" id="content"  name="Content" rows="20"></textarea>
                          </div>
                      
                        <input type="submit" value="subir" class="btn btn-primary">
                    


    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




