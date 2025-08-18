@extends('layouts.default')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto mt-5">
        <h1 class="text-2xl font-bold mb-4 pt-6">Dashboard</h1>
        <div class="flex justify-between w-full">
            <div>
                <a href="/clear" class="text-blue-600">Clear Webhooks</a>
            </div>
            <div>
                <a href="/configs" class="text-blue-600">Config</a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full mt-5 border-collapse border border-gray-200">
                <tr>
                    <th class="bg-gray-100 border p-3">Id</th>
                    <th class="bg-gray-100 border p-3 text-left">Webhook</th>
                </tr>

                @foreach ($webhooks as $webhook)
                    <tr>
                        <td class="bg-gray-100 border p-3">{{ $webhook->id }}</td>
                        <td class="bg-gray-100 border p-3  break-words">
                            <div>Full Url : {{ $webhook->full_url }}</div>
                            <div>Path : {{ $webhook->path }}</div>
                            <div>Host : {{ $webhook->host }}</div>
                            <div class="pb-4">Created At : {{ $webhook->created_at }}</div>
                            <div class="max-h-[200px] overflow-y-auto">
                                <pre class="text-xs bg-gray-50 p-2 rounded overflow-x-auto">{{ json_encode(
                                    [
                                        'header' => $webhook->header,
                                        'body' => $webhook->body,
                                    ],
                                    JSON_PRETTY_PRINT,
                                ) }}</pre>
                            </div>
                        </td>
                    </tr>
                @endforeach

                @if ($webhooks->count() == 0)
                    <tr>
                        <td colspan="2" class="bg-gray-100 border p-3">No webhooks found.</td>
                    </tr>
                @endif
            </table>

        </div>

    </div>
@endsection
