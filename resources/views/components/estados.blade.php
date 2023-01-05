@props(['estados']) 
<div class="flex flex-col md:flex-row">
    <select name ="id_estado"
        class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent form-select">
        
        <option value="0">Seleccione</option>
        @foreach ($estados as $estado)
            <option value="{{$estado->id_estado}}">{{$estado->estado}}</option>
        @endforeach 
    </select>
</div>
   
