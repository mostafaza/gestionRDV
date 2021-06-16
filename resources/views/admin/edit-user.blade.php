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

    <form method="POST" action="{{ route('user.update', $user->id) }}">
      @csrf
      @method('PUT')
      <!-- Name -->
      <div>
        <x-label for="name" :value="__('Nom')" />

        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" required autofocus />
      </div>

      <!-- Email Address -->
      <div class="mt-4">
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email" required />
      </div>

      <!-- Select Option Rol type -->
      <div class="mt-4">
      @foreach ($user->roles as $role)
        <x-label for="role_id" value="Role actuel : {{ $role->display_name }}" />
        @endforeach
        <select name="role_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
          <option value="user">Utilisateur</option>
          <option value="medecin">Medecin</option>
          <option value="medecin">Admin</option>
        </select>
      </div>

      <div class="flex items-center justify-end mt-4">
        <x-button class="ml-4">
          {{ __('Modifier') }}
        </x-button>
      </div>
    </form>

  </x-admin-auth-card>


</x-app-layout>