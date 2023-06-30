<div>
    {{-- Do your work, then step back. --}}
    <br>
    <br>
    <br>
    <h1 class="mt-5">usuarios</h1>
    <hr class="my-8">
    <p><strong>ID: </strong>{{ $user->id }}</p>
    <p><strong>NAME: </strong>{{ $user->name }}</p>
    <p><strong>EMAIL: </strong>{{ $user->email }}</p>
    <p>
        <a href="/" class="text-blue-900 underline italic">Volver</a>
    </p>
    <hr class="my-8">

    <form  wire:submit.prevent='update()' enctype="multipart/form-data">
        <div class="flex items-center">
            @if ($user->avatar)

                <img src="{{ asset('storage/'.$user->avatar) }}" alt="" class="mr-4 rounded-full w-24">

            @endif
            <input type="file" wire:model='file'>
            <button class="bg-blue-900 uppercase text-white p-2">
                Subir Avatar
            </button>
        </div>

        @error('file')

            <p class="italic text-xs text-red-600">{{ $message }}</p>

        @enderror

        @if (session()->has('message'))

            <p class="italic text-xs text-red-900">{{ session('message') }}</p>

        @endif

    </form>
</div>
