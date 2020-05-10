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
                <form class="form-inline" action="{{route('Pedit')}}">
                    <div class="form-group mx-sm-3 mb-2">
                    
                    <input type="text" class="form-control" id="" placeholder="Titulo de la Publicacion" name="titulo">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                </form>
                <div class="col-md-12">
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>IMAGEN</th>
                                <th>Contenido</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($publicaciones as $publicacion)
                        
                            <tr>
                            <td>
                            <a href="{{route('FPedit',$publicacion)}}"> <h3>{{$publicacion->titulo_publicacion}}</h3></a>
                                <br>
                                <img src="{{route('image',['filename'=>$publicacion->image_path])}}" alt="" width="200"></td>
                            <td>{!! $publicacion->contenido !!}</td>
                            <td><form action="{{route('Pdelete',$publicacion)}}" method="POST">
                                @csrf
                                 @method('delete')
                                 <input type="submit" value="Eliminar" class="btn btn-danger" onclick=" return confirm('¿Seguro deseas eliminar este post?')">
                            </form></td>
                            </tr> 
                            @endforeach
                            
                        </tbody>
                    </table>
                    {{$publicaciones->render()}}
                </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
