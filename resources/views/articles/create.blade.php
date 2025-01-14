@extends('layouts.principal')
@section('titulo')
Crear Articulo
@endsection
@section('cabecera')
Crear Artículo
@endsection
@section('contenido')
<div class="p-4 w-1/2 mx-auto bg-gray-100 rounded-xl shadow-xl">
    <form method="POST" action="{{route('articles.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{@old('nombre')}}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

            <x-errores.error for="nombre" />
        </div>

        <div class="mb-4">
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea id="descripcion" name="descripcion" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{@old('descripcion')}}</textarea>
            <x-errores.error for="descripcion" />
        </div>

        <div class="mb-4 flex items-center space-x-4">
            <span class="text-sm font-medium text-gray-700">Disponible</span>
            <div class="flex items-center">
                <input type="radio" @checked(@old('disponible')=='SI' )
                    id="disponible_si" name="disponible" value="SI" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                <label for="disponible_si" class="ml-2 text-sm text-gray-700">Sí</label>
            </div>
            <div class="flex items-center">
                <input type="radio" @checked(@old('disponible')=='NO' )
                    id="disponible_no" name="disponible" value="NO" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                <label for="disponible_no" class="ml-2 text-sm text-gray-700">No</label>
            </div>
        </div>
        <x-errores.error for="disponible" />
        <!-- Imagenes -->
        <div class="my-2">
            <label for="imagen" class="block text-sm font-medium text-gray-700">IMAGEN</label>
            <div class="flex justify-between">
                <div>
                    <input type="file" name="imagen" accept="image/*" id="imagen" 
                    oninput="preview.src=window.URL.createObjectURL(this.files[0])" />
                </div>
                <div class="ml-2">
                    <img id="preview" src="{{Storage::url('images/articles/noimage.png')}}" class="w-56 aspect-video object-fill border-2 border-black rounded-md"
                        </div>
                </div>
            </div>
            <x-errores.error for="imagen" />
        </div>
            <div class="flex flex-row-reverse">
                <button type="submit" class="p-2 rounded-xl font-bold text-white bg-purple-500 hover:bg-purple-700">
                    <i class="fas fa-save mr-1"></i>GUARDAR
                </button>
                <button type="reset" class="p-2 rounded-xl font-bold text-white bg-yellow-500 hover:bg-yellow-700 mx-2">
                    <i class="fas fa-paintbrush mr-1"></i>LIMPIAR
                </button>
                <a href="{{route('articles.index')}}" class="p-2 rounded-xl font-bold text-white bg-red-500 hover:bg-red-700">
                    <i class="fas fa-cancel">&nbsp;Cancelar</i>
                </a>
            </div>

    </form>
</div>
@endsection