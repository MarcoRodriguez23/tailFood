<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{route('admin.tables.create')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                    Create new table
                </a>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Name
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Guest Number
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Status
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Location
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Options
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tables as $table)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap text-center dark:text-white">
                                        {{$table->name}}
                                    </th>

                                    <td class="py-4 px-6 text-center">
                                        {{$table->guest_number}}
                                    </td>
                                    
                                    <td class="py-4 px-6 text-center">
                                        {{$table->status->name}}
                                    </td>
                                    
                                    <td class="py-4 px-6 text-center">
                                        {{$table->location->name}}
                                    </td>
                                    <td>
                                        <div class="flex space-x-2 justify-evenly">
                                            <a href="{{route('admin.tables.edit',$table->id)}}" 
                                                class="font-medium text-center px-4 py-2 bg-blue-500 hover:bg-blue-700 rounded-lg text-white"
                                                >
                                                Edit
                                            </a>
                                            <form action="{{route('admin.tables.destroy',$table->id)}}" 
                                                    method="POST" 
                                                    onsubmit="return confirm('Are you sure ?');"
                                                    class="px-4 py-2 text-center bg-red-500 hover:bg-red-700 rounded-lg  text-white"
                                                >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Delete</button>
                                            </form>
                                        </div>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
