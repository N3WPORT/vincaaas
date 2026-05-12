@extends('layouts.app')

@section('content')

{{-- SUCCESS MESSAGE --}}
@if(session('success'))

<div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl mb-6">

    {{ session('success') }}

</div>

@endif

{{-- HEADER --}}
<div class="flex justify-between items-center mb-6">

    <h1 class="text-3xl font-bold text-black">
        Monitoring Pertumbuhan
    </h1>

    {{-- BUTTON TAMBAH DATA --}}
    <a href="{{ route('growth-records.create') }}"
       class="inline-block bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 shadow-lg transition duration-200">

        <span class="text-white font-semibold">
            Tambah Data
        </span>

    </a>

</div>

{{-- TABLE --}}
<div class="bg-white rounded-2xl shadow overflow-hidden">

    <table class="w-full">

        {{-- TABLE HEADER --}}
        <thead class="bg-gray-100">

            <tr>

                <th class="p-4 text-left">
                    Nama Anak
                </th>

                <th class="p-4 text-left">
                    Berat
                </th>

                <th class="p-4 text-left">
                    Tinggi
                </th>

                <th class="p-4 text-left">
                    Tanggal
                </th>

                <th class="p-4 text-left">
                    Aksi
                </th>

            </tr>

        </thead>

        {{-- TABLE BODY --}}
        <tbody>

            @forelse($records as $record)

            <tr class="border-t hover:bg-gray-50">

                {{-- Nama Anak --}}
                <td class="p-4">
                    {{ $record->child->name }}
                </td>

                {{-- Berat --}}
                <td class="p-4">
                    {{ $record->weight }} kg
                </td>

                {{-- Tinggi --}}
                <td class="p-4">
                    {{ $record->height }} cm
                </td>

                {{-- Tanggal --}}
                <td class="p-4">
                    {{ $record->measurement_date }}
                </td>

                {{-- AKSI --}}
                <td class="p-4">

                    <div class="flex gap-2">

                        {{-- EDIT --}}
                        <a href="{{ route('growth-records.edit', $record->id) }}"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg shadow">

                            Edit

                        </a>

                        {{-- DELETE --}}
                        <form action="{{ route('growth-records.destroy', $record->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Hapus data pertumbuhan?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow">

                                Delete

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="5"
                    class="p-6 text-center text-gray-500">

                    Belum ada data pertumbuhan

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection