@extends('layouts.default')

@section('title', 'Configs')

@section('content')
    <div class="container mx-auto mt-5">
        <h1 class="text-2xl font-bold mb-4 pt-6">Configs</h1>
        <div class="flex justify-between w-full">
            <div>
                <a href="/configs/create" class="text-blue-600">Add Config</a>
                <span> | </span>
                <a href="/configs/clear" class="text-blue-600">Clear Config</a>
            </div>
            <div>
                <a href="/dashboard" class="text-blue-600">Back to Dashboard</a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full mt-5 border-collapse border border-gray-200">
                <tr>
                    <th class="bg-gray-100 border p-3">Id</th>
                    <th class="bg-gray-100 border p-3 text-left">From URL</th>
                    <th class="bg-gray-100 border p-3 text-left">To URL</th>
                    <th class="bg-gray-100 border p-3 text-left">Action</th>
                </tr>

                @foreach ($configs as $config)
                    <tr>
                        <td class="bg-gray-100 border p-3">{{ $config->id }}</td>
                        <td class="bg-gray-100 border p-3">{{ $config->from_domain_url }}</td>
                        <td class="bg-gray-100 border p-3">{{ $config->to_domain_url }}</td>
                        <td class="bg-gray-100 border p-3">
                            <form action="/configs/{{ $config->id }}" method="post" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if ($configs->count() == 0)
                    <tr>
                        <td colspan="4" class="bg-gray-100 border p-3">No Configs found.</td>
                    </tr>
                @endif
            </table>

        </div>

    </div>
@endsection
