@props(['data'])

<div>
    <form method="post" enctype="multipart/form-data" action="{{ route('/') }}">
        @csrf
        @isset($data)
            <input type="hidden" value="{{ $data->id }}" name="id">
        @endisset
        <div class="container mx-auto bg-white rounded-lg">
            <div class="grid grid-cols-2">
                <div class="col-span-2">
                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300">
                            </div>
                        </div>
                        <div class="relative flex justify-center text-sm leading-5">
                            <span class="px-2 text-gray-500 bg-white">
                                Datos del usuario
                            </span>
                        </div>
                    </div>
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                </div>
                <div class="container">
                    <div class="w-full space-y-6">
                        <div class="w-full">
                            <div class="relative ">
                                <x-label for="nombre" :value="__('Nombres')" />
                                <input type="text" id="nombre" name="nombre"
                                    class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    value="{{ $data->nombres }}" readonly />
                            </div>
                        </div>

                        <div class="w-full">
                            <div class="relative ">
                                <x-label for="telefono" :value="__('Telefono')" />
                                <input type="text" id="telefono" name="telefono"
                                    class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    value="{{ $data->telefono }}" readonly />
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="relative ">
                                <x-label for="fecha_nacimiento" :value="__('Fecha de nacimiento')" />
                                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                                    class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    value="{{ $data->fecha_nacimiento }}" readonly />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="w-full space-y-6">
                        <div class="w-full">
                            <div class="relative ">
                                <x-label for="apellido" :value="__('Apellidos')" />
                                <input type="text" id="apellido" name="apellido"
                                    class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    value="{{ $data->apellidos }}" readonly />
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="relative ">
                                <x-label for="cedula" :value="__('Cedula')" />
                                <input type="text" id="cedula" name="cedula"
                                    class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    value="{{ $data->cedula }}" readonly />
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="relative ">
                                <x-label for="correo" :value="__('Correo')" />
                                <input type="email" id="correo" name="correo"
                                    class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    value="{{ $data->correo }}" readonly />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="flex justify-center pt-5">
                        <span class="rounded-md shadow-sm">
                            <button type="reset" id="cancelar" onclick="changeCancelar()"
                                class="px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-red-600 rounded-lg shadow-md hover:bg-red-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 "
                                hidden>
                                Cancelar
                            </button>
                            <button type="submit" id="submit"
                                class="px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 "
                                hidden>
                                Guardar
                            </button>
                            <button type="button" id="editar" onclick="changeEdit()"
                                class="px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                                Editar
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function changeEdit(params) {
        document.getElementById('editar').hidden = true;
        document.getElementById('submit').hidden = false;
        document.getElementById('cancelar').hidden = false;

        document.getElementById('nombre').readOnly = false;
        document.getElementById('telefono').readOnly = false;
        document.getElementById('fecha_nacimiento').readOnly = false;
        document.getElementById('apellido').readOnly = false;
        document.getElementById('cedula').readOnly = false;
    }

    function changeCancelar(params) {
        document.getElementById('editar').hidden = false;
        document.getElementById('submit').hidden = true;
        document.getElementById('cancelar').hidden = true;

        document.getElementById('nombre').readOnly = true;
        document.getElementById('telefono').readOnly = true;
        document.getElementById('fecha_nacimiento').readOnly = true;
        document.getElementById('apellido').readOnly = true;
        document.getElementById('cedula').readOnly = true;
    }

</script>
