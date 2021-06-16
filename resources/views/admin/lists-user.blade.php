<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard admin') }}
    </h2>
  </x-slot>
  <!-- This example requires Tailwind CSS v2.0+ -->
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <table class="min-w-max w-full table-auto">
          <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
              <th class="py-3 px-6 text-left">id</th>
              <th class="py-3 px-6 text-left">name</th>
              <th class="py-3 px-6 text-center">email</th>
              <th class="py-3 px-6 text-center">date création</th>
              <th class="py-3 px-6 text-center">role</th>
              <th class="py-3 px-6 text-center">Actions</th>
            </tr>
          </thead>
          @foreach ($users as $user)
          <tbody class="text-gray-600 text-sm font-light">
            <tr class="border-b border-gray-200 hover:bg-gray-100">

              <td class="py-3 px-6 text-left">
                <div class="flex items-center">
                  <span class="font-medium">{{$user->id}}</span>
                </div>
              </td>
              <td class="py-3 px-6 text-left">
                <div class="flex items-center">
                  <span class="font-medium">{{$user->name}}</span>
                </div>
              </td>
              <td class="py-3 px-6 text-left">
                <div class="flex items-center">
                  <span class="font-medium">{{$user->email}}</span>
                </div>
              </td>
              <td class="py-3 px-6 text-left">
                <div class="flex items-center">
                  <span class="font-medium">{{$user->created_at}}</span>
                </div>
              </td>
              <td class="py-3 px-6 text-center">
                @foreach ($user->roles as $role)
                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{$role->name}}</span>
                @endforeach
              </td>

              <td class="py-3 px-6 text-center">
                <div class="flex item-center justify-center space-x-4">
                  <a href="{{ route('user.edit', $user->id)}}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    Edit
                  </a>
                  <form action="{{ route('user.destroy', $user->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full"" type="submit">Supprimer
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>

      </div>
    </div>
  </div>
  </div>
</x-app-layout>