@props(['archivos'])
<!-- component -->
    <!-- file upload modal -->
    <article aria-label="File Upload Modal" class="relative flex flex-col bg-white rounded-md"
        ondrop="dropHandler(event);" ondragover="dragOverHandler(event);" ondragleave="dragLeaveHandler(event);"
        ondragenter="dragEnterHandler(event);">
        <!-- overlay -->
        <div id="">

            <p class=""><b>Suelta archivos para subir</b></p>
        </div>
        <!-- scroll area -->
        <section class="">
            <header class="flex flex-col items-center justify-center py-12 border-2 border-gray-400 border-dashed">
                <p class="flex flex-wrap justify-center mb-3 font-semibold text-gray-900">
                    <span>Arrastre y suelte su</span>&nbsp;<span>archivo en cualquier lugar o</span>
                </p>
                <input id="hidden-input" type="file" class="hidden" accept="image/*" name="img_file"
                    value="{{ $archivos ?? (old('archivos') ?? '') }}" required/>
                <button id="button" type="button"
                    class="px-3 py-1 mt-2 bg-gray-200 rounded-sm hover:bg-gray-300 focus:shadow-outline focus:outline-none" require>
                    Cargar un archivo
                </button>
            </header>
            <h1 class="pt-8 pb-3 font-semibold text-gray-900 sm:text-lg">
                Para cargar
            </h1>

            <ul id="gallery" class="flex flex-wrap flex-1 -m-1">
                <li id="empty" class="flex flex-col items-center justify-center w-full h-full text-center">
                    <img class="w-32 mx-auto"
                        src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png"
                        alt="no data" />
                    <span class="text-gray-500 text-small">No files selected</span>
                </li>
            </ul>
        </section>
    </article>


<!-- using two similar templates for simplicity in js code -->
<template id="file-template">
    <li class="block w-1/2 h-24 p-1 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8">
        <article tabindex="0"
            class="relative w-full h-full bg-gray-100 rounded-md shadow-sm cursor-pointer group focus:outline-none focus:shadow-outline elative">
            <img alt="upload preview"
                class="sticky hidden object-cover w-full h-full bg-fixed rounded-md img-preview" />

            <section class="absolute top-0 z-20 flex flex-col w-full h-full px-3 py-2 text-xs break-words rounded-md">
                <h1 class="flex-1 group-hover:text-blue-800"></h1>
                <div class="flex">
                    <span class="p-1 text-blue-800">
                        <i>
                            <svg class="w-4 h-4 pt-1 ml-auto fill-current" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                            </svg>
                        </i>
                    </span>
                    <p class="p-1 text-xs text-gray-700 size"></p>
                    <button class="p-1 ml-auto text-gray-800 rounded-md delete focus:outline-none hover:bg-gray-300">
                        <svg class="w-4 h-4 ml-auto pointer-events-none fill-current" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24">
                            <path class="pointer-events-none"
                                d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                        </svg>
                    </button>
                </div>
            </section>
        </article>
    </li>
</template>

<template id="image-template">
    <li class="block w-1 h-24 p-1 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8">
        <article tabindex="0"
            class="relative w-full h-full text-transparent bg-gray-100 rounded-md shadow-sm cursor-pointer group hasImage focus:outline-none focus:shadow-outline hover:text-white">
            <img alt="upload preview" class="sticky object-cover w-full h-full bg-fixed rounded-md img-preview" />

            <section class="absolute top-0 z-20 flex flex-col w-full h-full px-3 py-2 text-xs break-words rounded-md">
                <h1 class="flex-1"></h1>
                <div class="flex">
                    <span class="p-1">
                        <i>
                            <svg class="w-4 h-4 ml-auto fill-current pt-" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path
                                    d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z" />
                            </svg>
                        </i>
                    </span>

                    <p class="p-1 text-xs size"></p>
                    <button class="p-1 ml-auto rounded-md delete focus:outline-none hover:bg-gray-300">
                        <svg class="w-4 h-4 ml-auto pointer-events-none fill-current" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24">
                            <path class="pointer-events-none"
                                d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                        </svg>
                    </button>
                </div>
            </section>
        </article>
    </li>
</template>

<script>
    const fileTempl = document.getElementById("file-template"),
        imageTempl = document.getElementById("image-template"),
        empty = document.getElementById("empty");


    const fileTypes = ["image/apng", "image/bmp", "image/gif", "image/jpeg", "image/pjpeg", "image/png",
        "image/svg+xml", "image/tiff", "image/webp", "image/x-icon"
    ];

    // use to store pre selected files
    let FILES = {};
    let FILE;

    function validFileType(file) {
        return fileTypes.includes(file.type);
    }

    // check if file is of type image and prepend the initialied
    // template to the target element
    function addFile(target, file) {
        if (validFileType(file)) {

            //Reemplaza la wea anterior
            while (target.firstChild) {
                target.removeChild(target.firstChild);
            }

            const isImage = file.type.match("image.*"),
                objectURL = URL.createObjectURL(file);

            const clone = isImage ?
                imageTempl.content.cloneNode(true) :
                fileTempl.content.cloneNode(true);

            clone.querySelector("h1").textContent = file.name;
            clone.querySelector("li").id = objectURL;
            clone.querySelector(".delete").dataset.target = objectURL;
            clone.querySelector(".size").textContent =
                file.size > 1024 ?
                file.size > 1048576 ?
                Math.round(file.size / 1048576) + "mb" :
                Math.round(file.size / 1024) + "kb" :
                file.size + "b";

            isImage &&
                Object.assign(clone.querySelector("img"), {
                    src: objectURL,
                    alt: file.name
                });

            empty.classList.add("hidden");
            target.prepend(clone);
            //FILES[objectURL] = file.name;
            FILE = file.name;
            console.log(FILE);

        } else {
            console.log(file.name);
            alert("Solo se debe subir archivos de imagen");
        }

    }

    const gallery = document.getElementById("gallery"),
        overlay = document.getElementById("overlay");

    // click the hidden input of type file if the visible button is clicked
    // and capture the selected files
    const hidden = document.getElementById("hidden-input");
    document.getElementById("button").onclick = () => hidden.click();
    hidden.onchange = (e) => {
        for (const file of e.target.files) {
            addFile(gallery, file);
        }
    };

    // use to check if a file is being dragged
    const hasFiles = ({
            dataTransfer: {
                types = []
            }
        }) =>
        types.indexOf("Files") > -1;

    // use to drag dragenter and dragleave events.
    // this is to know if the outermost parent is dragged over
    // without issues due to drag events on its children
    let counter = 0;

    // reset counter and append file to gallery when file is dropped
    function dropHandler(ev) {
        ev.preventDefault();
        for (const file of ev.dataTransfer.files) {
            addFile(gallery, file);
            overlay.classList.remove("draggedover");
            counter = 0;
        }
    }

    // only react to actual files being dragged
    function dragEnterHandler(e) {
        e.preventDefault();
        if (!hasFiles(e)) {
            return;
        }
        ++counter && overlay.classList.add("draggedover");
    }

    function dragLeaveHandler(e) {
        1 > --counter && overlay.classList.remove("draggedover");
    }

    function dragOverHandler(e) {
        if (hasFiles(e)) {
            e.preventDefault();
        }
    }

    // event delegation to caputre delete events
    // fron the waste buckets in the file preview cards
    gallery.onclick = ({
        target
    }) => {
        if (target.classList.contains("delete")) {
            const ou = target.dataset.target;
            document.getElementById(ou).remove(ou);
            gallery.children.length === 1 && empty.classList.remove("hidden");
            delete FILES[ou];
        }
    };

    // print all selected files
    document.getElementById("submit").onclick = () => {
        alert(`Submitted Files:\n${JSON.stringify(FILES)}`);
        console.log(FILES);
    };

    // clear entire selection
    document.getElementById("cancel").onclick = () => {
        while (gallery.children.length > 0) {
            gallery.lastChild.remove();
        }
        FILES = {};
        empty.classList.remove("hidden");
        gallery.append(empty);
    };

</script>

<style>
    .hasImage:hover section {
        background-color: rgba(5, 5, 5, 0.4);
    }

    .hasImage:hover button:hover {
        background: rgba(5, 5, 5, 0.45);
    }

    #overlay p,
    i {
        opacity: 0;
    }

    #overlay.draggedover {
        background-color: rgba(255, 255, 255, 0.7);
    }

    #overlay.draggedover p,
    #overlay.draggedover i {
        opacity: 1;
    }

    .group:hover .group-hover\:text-blue-800 {
        color: #2b6cb0;
    }

</style>
