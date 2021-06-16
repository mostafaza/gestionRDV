<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Prendre un rdv') }}
        </h2>
    </x-slot>

    <x-admin-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('consultation.store') }}">
            @csrf

            <!-- Motif -->
            <div>
                <x-label for="motif" :value="__('Motif')" />

                <x-input id="motif" class="block mt-1 w-full" type="text" name="motif" :value="old('motif')" required autofocus />
            </div>

            <!-- Select Option Rol type -->
            <div class="mt-4">
                    <x-label for="medecin_id" value="{{ __('Creer un') }}" />
                    <select name="medecin_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                    </select>
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Créer') }}
                </x-button>
            </div>
        </form>
        
    </x-admin-auth-card>
</x-app-layout>
