<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create an users') }}
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

        <form method="POST" action="{{ route('user.store') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nom')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('mot de passe')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            
            <!-- Select Option Rol type -->
            <div class="mt-4">
                    <x-label for="role_id" value="{{ __('Creer un') }}" />
                    <select name="role_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="user">Utilisateur</option>
                        <option value="medecin">Medecin</option>
                        <option value="medecin">Admin</option>
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
