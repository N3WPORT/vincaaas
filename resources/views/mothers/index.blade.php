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

    <h1 class="text-3xl font-bold">
        Data Ibu
    </h1>

    <a href="{{ route('mothers.create') }}"
       class="bg-pink-600 hover:bg-pink-700 text-white px-5 py-3 rounded-xl">

        Tambah Ibu

    </a>

</div>

{{-- TABLE --}}
<div class="bg-white rounded-2xl shadow overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="p-4 text-left">
                    Nama
                </th>

                <th class="p-4 text-left">
                    NIK
                </th>

                <th class="p-4 text-left">
                    Telepon
                </th>

                <th class="p-4 text-left">
                    Aksi
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($mothers as $mother)

            <tr class="border-t hover:bg-gray-50">

                <td class="p-4">
                    {{ $mother->name }}
                </td>

                <td class="p-4">
                    {{ $mother->nik }}
                </td>

                <td class="p-4">
                    {{ $mother->phone }}
                </td>

                <td class="p-4">

                    <div class="flex gap-2">

                        {{-- EDIT --}}
                        <a href="{{ route('mothers.edit', $mother->id) }}"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg">

                            Edit

                        </a>

                        {{-- DELETE --}}
                        <form action="{{ route('mothers.destroy', $mother->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Hapus data ibu?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">

                                Delete

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="4"
                    class="p-6 text-center text-gray-500">

                    Belum ada data ibu

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection