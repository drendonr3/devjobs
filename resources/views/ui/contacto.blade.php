<aside class="md:w-2/5 bg-gray-300 p-5 rounded m-3">
    <h2 class="text-2xl my-5 text-white uppercase font-bold text-center">Contacta al Reclutador</h2>
    <form action="{{route('candidatos.store')}}" method="POST" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="mb-4">
            <label for="nombre" class="block text-white text-sm font-bold mb-4">
                Nombre:
            </label>
            <input 
                type="text"
                id="nombre"
                class="p-3 bg-gray-100 counded form-inpu w-full @error('nombre') border border-red-500 @enderror"
                name="nombre"
                placeholder="Tu Nombre"
                value="{{old('nombre')}}"                   
            >
            @error('nombre')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 
                    rounded relative mt-3 mb-6"
                    role="alert"
                    >
                        <strong class="font-bold">Error!</strong>
                        <span>{{$message}}</span>
                </div>
            @enderror                   
        </div>
        <div class="mb-4">
            <label for="email" class="block text-white text-sm font-bold mb-4">
                Email:
            </label>
            <input 
                type="email"
                id="email"
                class="p-3 bg-gray-100 counded form-inpu w-full @error('email') border border-red-500 @enderror"
                name="email"
                placeholder="Tu Email"
                value="{{old('email')}}"                   
            >
            @error('email')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 
                    rounded relative mt-3 mb-6"
                    role="alert"
                    >
                        <strong class="font-bold">Error!</strong>
                        <span>{{$message}}</span>
                </div>
            @enderror                   
        </div>
        <div class="mb-4">
            <label for="cv" class="block text-white text-sm font-bold mb-4">
                Curriculum (PDF):
            </label>
            <input 
                type="file"
                id="cv"
                class="p-3 counded form-inpu w-full @error('cv') border border-red-500 @enderror"
                name="cv"
                accept="application/pdf"
            >
            @error('cv')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 
                    rounded relative mt-3 mb-6"
                    role="alert"
                    >
                        <strong class="font-bold">Error!</strong>
                        <span>{{$message}}</span>
                </div>
            @enderror                   
        </div>
        <input type="hidden" name="vacante_id" value="{{$vacante->id}}">

        <div class="mb-5">
            <input 
                type="submit"
                class="bg-gray-500 w-full hover:bg-gray-900 focus:shadow-outline
                text-gray-100 p-3 focus:outline-none font-bold uppercase"
                value="Contactar"
            >
        </div>
    </form>
</aside>