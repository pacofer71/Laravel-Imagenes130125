@props(['for'])

@error($for)
<p class="mt-1 italic text-sm text-red-500">
    {{$message}}
</p>
@enderror