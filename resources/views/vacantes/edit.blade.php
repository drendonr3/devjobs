@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" />
@endsection

@section('navegacion')
    @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Editar Vacante {{$vacante->titulo}}</h1>
    <form 
    class="max-w-lg mx-auto my-10" 
    action="{{route('vacantes.update',['vacante'=>$vacante->id])}}"
    method="POST"
>
    @csrf
    @method('PUT')
    <div class="mb-5">
        <label 
            for="titulo" 
            class="block text-gray-700 text-sm mb-2"
        >
            Titulo Vacante:
        </label>
        <input 
            id="titulo" 
            type="text" 
            class="bg-gray-100 p-3 rounded form-input w-full hover:bg-white @error('titulo') border-red-500 border @enderror" 
            name="titulo" 
            placeholder="Título Vacante"
            value="{{$vacante->titulo}}">

        @error('titulo')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 
                rounded relative mt-3 mb-6"
                role="alert"
                >
                    <strong class="font-bold">Error!</strong>
                    <span>{{$message}}</span>
            </div>
        @enderror
    </div>

    <div class="mb-5">
        <label 
            for="categoria" 
            class="block text-gray-700 text-sm mb-2"
        >
            Categoría Vacante:
        </label>

        <select
            id='categoria'
            class="block apperance-none w-full border border-gray-200
            text-gray-700 rounded leading-tight focus:outline-none 
            focus:bg-white focus:border-gray-500 p-3 bg-gray-100 
            @error('categoria') border-red-500 border @enderror"
            name="categoria"
        > 
            <option value="" disabled selected>-- Selecciona --</option>
            @foreach($categorias as $categoria)
                <option 
                {{$vacante->categoria_id==$categoria->id?'selected':''}} 
                value="{{$categoria->id}}">{{$categoria->nombre}}</option>
            @endforeach
        </select>

        @error('categoria')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 
                rounded relative mt-3 mb-6"
                role="alert"
                >
                    <strong class="font-bold">Error!</strong>
                    <span>{{$message}}</span>
            </div>
        @enderror
    </div>

    <div class="mb-5">
        <label 
            for="experiencia" 
            class="block text-gray-700 text-sm mb-2"
        >
            Experiencia:
        </label>

        <select
            id='experiencia'
            class="block apperance-none w-full border border-gray-200
            text-gray-700 rounded leading-tight focus:outline-none 
            focus:bg-white focus:border-gray-500 p-3 bg-gray-100 
            @error('categoria') border-red-500 border @enderror"
            name="experiencia"
        > 
            <option value="" disabled selected>-- Selecciona --</option>
            @foreach($experiencias as $experiencia)
                <option {{$vacante->experiencia_id==$experiencia->id?'selected':''}} 
                value="{{$experiencia->id}}">{{$experiencia->nombre}}</option>
            @endforeach
        </select>
        @error('experiencia')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 
                rounded relative mt-3 mb-6"
                role="alert"
                >
                    <strong class="font-bold">Error!</strong>
                    <span>{{$message}}</span>
            </div>
        @enderror
    </div>

    <div class="mb-5">
        <label 
            for="ubicacion" 
            class="block text-gray-700 text-sm mb-2"
        >
            Ubicación:
        </label>

        <select
            id='ubicacion'
            class="block apperance-none w-full border border-gray-200
            text-gray-700 rounded leading-tight focus:outline-none 
            focus:bg-white focus:border-gray-500 p-3 bg-gray-100 
            @error('categoria') border-red-500 border @enderror"
            name="ubicacion"
        > 
            <option value="" disabled selected>-- Selecciona --</option>
            @foreach($ubicacions as $ubicacion)
                <option  {{$vacante->ubicacion_id==$ubicacion->id?'selected':''}} 
                    value="{{$ubicacion->id}}">{{$ubicacion->nombre}}</option>
            @endforeach
        </select>
        @error('ubicacion')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 
                rounded relative mt-3 mb-6"
                role="alert"
                >
                    <strong class="font-bold">Error!</strong>
                    <span>{{$message}}</span>
            </div>
        @enderror
    </div>

    <div class="mb-5">
        <label 
            for="salario" 
            class="block text-gray-700 text-sm mb-2"
        >
            Salario:
        </label>

        <select
            id='salario'}
            class="block apperance-none w-full border border-gray-200
            text-gray-700 rounded leading-tight focus:outline-none 
            focus:bg-white focus:border-gray-500 p-3 bg-gray-100 
            @error('categoria') border-red-500 border @enderror"
            name="salario"
        > 
            <option value="" disabled selected>-- Selecciona --</option>
            @foreach($salarios as $salario)
                <option {{$vacante->salario_id==$salario->id?'selected':''}} 
                value="{{$salario->id}}">{{$salario->nombre}}</option>
            @endforeach
        </select>
        @error('salario')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 
                rounded relative mt-3 mb-6"
                role="alert"
                >
                    <strong class="font-bold">Error!</strong>
                    <span>{{$message}}</span>
            </div>
        @enderror
    </div>

    <div class="mb-5">
        <label 
            for="descripcion" 
            class="block text-gray-700 text-sm mb-2"
        >
            Descripción del Puesto:
        </label>

        <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700 hover:bg-white
        @error('descripcion') border-red-500 border @enderror"></div>
        <input type="hidden" name='descripcion' id='descripcion' value="{{$vacante->descripcion}}">

        @error('descripcion')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 
                rounded relative mt-3 mb-6"
                role="alert"
                >
                    <strong class="font-bold">Error!</strong>
                    <span>{{$message}}</span>
            </div>
        @enderror
    </div>

    <div class="mb-5">
        <label 
            for="habilidades" 
            class="block text-gray-700 text-sm mb-2"
        >
            Habilidades y Conocimientos:
        </label>
        @php
            $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails']
        @endphp

        <lista-skills
            class="@error('skills') border-red-500 border @enderror"
            :skills="{{json_encode($skills)}}"
            :oldskills="{{json_encode($vacante->skills)}}">
        </lista-skills>
        @error('skills')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 
                rounded relative mt-3 mb-6"
                role="alert"
                >
                    <strong class="font-bold">Error!</strong>
                    <span>{{$message}}</span>
            </div>
        @enderror
    </div>

    <div class="mb-5">
        <label 
            for="dropzoneDevJobs" 
            class="block text-gray-700 text-sm mb-2"
        >
            Imagen Vacante:
        </label>

        <div 
            id="dropzoneDevJobs" 
            class="dropzone rounded bg-gray-100
            @error('categoria') border-red-500 border @enderror"
        ></div>
        <input type="hidden"
            name="imagen"
            id = "imagen"
            value="{{$vacante->imagen}}">

        <p id="error"></p>

        @error('imagen')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 
            rounded relative mt-3 mb-6"
            role="alert"
            >
                <strong class="font-bold">Error!</strong>
                <span>{{$message}}</span>
        </div>
    @enderror
    </div>

    <div class="mb-5">
        <input 
            type="submit"
            class="bg-gray-500 w-full hover:bg-gray-900 focus:shadow-outline
            text-gray-100 p-3 focus:outline-none font-bold uppercase"
            value="Publicar Vacante"
        >
    </div>
</form>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js" integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w==" crossorigin="anonymous"></script>

<script>
    Dropzone.autoDiscover = false;
    document.addEventListener('DOMContentLoaded',()=>{
        // Medium Editor
        const editor = new MediumEditor('.editable',{
            toolbar : {
                buttons:['bold','italic','underline','quote','anchor','justifyCenter',
                'justifyLeft','justifyRight','justifyFullr','orderedList','unorderedList','h2','h3'],
                static: true,
                sticky: true
            },
            placeholder: {
                text:'Información de la Vacante'
            }
        });
        // Agrega lo al input loq ue el usuario escribe en medium editor
        editor.subscribe('editableInput', function(eventObj,editable){
            const contenido = editor.getContent();
            document.querySelector('#descripcion').value = contenido;
        })

        // Llena el editor con el contenido del input hidden
        editor.setContent(document.querySelector('#descripcion').value)

        //Dropzone
        const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs',{
            url: "/vacantes/imagen",
            dictDefaultMessage: 'Sube Aquí tu Archivo',
            acceptedFiles:".png,.jpg,.jpeg,.gif,.bmp",
            addRemoveLinks:true,
            dictRemoveFile:'Borrar Archivo',
            maxFiles:1,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token').content
            },
            init: function() {
                if(document.querySelector('#imagen').value.trim()){
                    let imagenPublicada= {};
                    imagenPublicada.size = 1234;
                    imagenPublicada.name = document.querySelector('#imagen').value;

                    this.options.addedfile.call(this,imagenPublicada);
                    this.options.thumbnail.call(this,imagenPublicada,`/storage/vacantes/${imagenPublicada.name}`);
                    imagenPublicada.previewElement.classList.add('dz-success');
                    imagenPublicada.previewElement.classList.add('dz-complete');
                }
            },
            success: function(file,response){
                document.querySelector('#error').textContent = '';
                // Coloca el nomnres desde el servidor en el input hidden
                document.querySelector('#imagen').value = response.correcto;

                // Añadir al objeto de archivo
                file.nombreServidor = response.correcto;
            },
            error: function(file,response){
                document.querySelector('#error').textContent = 'Formato no Válido';
            },
            maxfilesexceeded: function(file) {
                document.querySelector('#error').textContent = '';
                if(this.files[1] !=null){
                    this.removeFile(this.files[0]); //Elimina archuivo anterior
                    this.addFile(file); // Agregar el nuevo archivo
                }
            },
            removedfile: function(file,response){
                document.querySelector('#error').textContent = '';
                file.previewElement.parentNode.removeChild(file.previewElement);
                params = {
                    imagen:file.nombreServidor ?? document.querySelector('#imagen').value
                }
                axios.post('/vacantes/borrarimagen',params)
                    .then(respuesta=>console.log(respuesta))
            }
        })
    });
</script>

@endsection