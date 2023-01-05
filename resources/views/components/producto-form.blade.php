@props(['route', 'data'])

<form method="post" enctype="multipart/form-data" action="{{ $route }}">
    @csrf
    @isset($data)
        <input type="hidden" value="{{ $data->id }}" name="id_producto">
    @endisset
    <div class="container mx-auto bg-white rounded-lg">
        <div class="grid grid-cols-2">
            <div class="col-span-2 py-6">
                <div class="relative mb-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300">
                        </div>
                    </div>
                    <div class="relative flex justify-center text-sm leading-5">
                        <span class="px-2 text-gray-500 bg-white">
                            {{ $title }}
                        </span>
                    </div>
                </div>
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
            </div>

            <div class="container">
                <div class="w-full space-y-6">
                    <div class="w-full">
                        <div class="relative ">
                            <input type="text" id="search-form-price" name="titulo"
                                class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                placeholder="Titulo del libro" value="{{ $data->titulo ?? (old('titulo') ?? '') }}" required/>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="relative ">
                            <input type="text" id="author" name="autor"
                                class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                placeholder="Autor del libro" value="{{ $data->autor ?? (old('autor') ?? '') }}" required/>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="relative ">
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">
                                        $
                                    </span>
                                </div>
                                <input type="text" name="precio" id="precio"
                                    class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    placeholder="0.00" value="{{ $data->precio ?? (old('precio') ?? '') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="relative">
                            <textarea
                                class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none resize-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                placeholder="Descripción" name="descripcion"
                                rows="7" required>{{ $data->descripcion ?? (old('descripcion') ?? '') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <x-upload-file />
            </div>
            <div class="col-span-2">
                <div class="flex justify-center pt-5">
                    <span class="rounded-md shadow-sm">
                        <button type="submit" id="submit"
                            class="px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                            Guardar
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</form>
