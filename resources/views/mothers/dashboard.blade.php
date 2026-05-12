@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Dashboard Ibu
</h1>

@if($mother)

<div class="bg-white rounded-2xl shadow p-6 mb-6">

    <h2 class="text-2xl font-bold mb-2">
        {{ $mother->name }}
    </h2>

    <p class="text-gray-500">
        {{ $mother->phone }}
    </p>

</div>

@endif

<div class="bg-white rounded-2xl shadow p-6">

    <h2 class="text-2xl font-bold mb-6">
        Data Anak
    </h2>

    @forelse($children as $child)

        <div class="border rounded-xl p-4 mb-4">

            <h3 class="font-bold text-lg">
                {{ $child->name }}
            </h3>

            <p>
                Gender: {{ $child->gender }}
            </p>

            <p>
                Tanggal Lahir: {{ $child->birth_date }}
            </p>

        </div>

    @empty

        <p class="text-gray-500">
            Belum ada data anak
        </p>

    @endforelse

</div>

@endsection