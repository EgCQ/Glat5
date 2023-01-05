<div>
    <form action="{{ route('createRole') }}" method="post">
        @csrf
        <div class="container px-4 py-4 mx-auto bg-white rounded-lg w-50">
            <div class="">
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300">
                        </div>
                    </div>
                    <div class="relative flex justify-center text-sm leading-5">
                        <span class="px-2 text-gray-500 bg-white">
                            Agregar nuevo rol
                        </span>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="w-full space-y-6">
                    <div class="w-full">
                        <div class="relative ">
                            <input type="text" id="funcion" name="funcion"
                                class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 uppercase bg-white border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                placeholder="Nombre rol" />
                        </div>
                    </div>
                    <div class="w-full ">
                        <div class="flex justify-end">
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
        </div>
    </form>
</div>
