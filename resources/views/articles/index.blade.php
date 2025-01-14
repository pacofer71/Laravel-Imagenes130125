@extends('layouts.principal')
@section('titulo')
Articulos
@endsection
@section('cabecera')
Listado de artículos
@endsection
@section('contenido')


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex flex-row-reverse mb-2">
        <a href="{{route('articles.create')}}" class="rounded-xl p-2 font-bold text-white bg-blue-500 hover:bg-blue-700">
            <i class="fas fa-add">NUEVO</i>
        </a>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-16 py-3">
                    <span class="sr-only">Imagen</span>
                </th>
                <th scope="col" class="px-6 py-3">
                    NOMBRE
                </th>
                <th scope="col" class="px-6 py-3">
                    Descripción
                </th>
                <th scope="col" class="px-6 py-3">
                    Disponible
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($articulos as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="p-4">
                    <img src="{{Storage::url($item->imagen)}}" class="w-16 md:w-32 max-w-full max-h-full" alt="{{$item->nombre}}">
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{$item->nombre}}
                </td>
                <td class="px-6 py-4">
                    {{$item->descripcion}}
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{$item->disponible}}
                </td>
                <td class="px-6 py-4">
                    <form action="{{route('articles.destroy', $item)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <i class="fas fa-trash text-red-500"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">
        {{$articulos->links()}}
</div>
@endsection
@section('alertas')
@endsection