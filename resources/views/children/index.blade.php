@extends('layouts.app')

@section('content')

{{-- FLASH MESSAGE --}}
@if(session('success'))

<div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl mb-6">

    {{ session('success') }}

</div>

@endif

{{-- HEADER --}}
<div class="flex justify-between items-center mb-6">

    <h1 class="text-3xl font-bold">
        Data Anak
    </h1>

    <a href="{{ route('children.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl">

        Tambah Anak

    </a>

</div>

{{-- TABLE --}}
<div class="bg-white rounded-2xl shadow overflow-hidden">

    <table class="w-full">

        {{-- TABLE HEADER --}}
        <thead class="bg-gray-100">

            <tr>

                <th class="p-4 text-left">
                    Nama
                </th>
                <th class="p-4 text-left">
                    Nama Ibu
                </th>
                <th class="p-4 text-left">
                    Gender
                </th>

                <th class="p-4 text-left">
                    Tanggal Lahir
                </th>

                <th class="p-4 text-left">
                    Aksi
                </th>

            </tr>

        </thead>

        {{-- TABLE BODY --}}
        <tbody>

            @forelse($children as $child)

            <tr class="border-t hover:bg-gray-50">

                {{-- Nama --}}
                <td class="p-4">
                    {{ $child->name }}
                </td>

                <td class="p-4">

                    <a href="{{ route('mothers.show', $child->mother->id) }}"
                    class="text-blue-600 hover:underline">

                        {{ $child->mother->name ?? '-' }}

                    </a>

                </td>

                {{-- Gender --}}
                <td class="p-4">

                    @if($child->gender == 'L')

                        Laki-laki

                    @else

                        Perempuan

                    @endif

                </td>

                {{-- Tanggal Lahir --}}
                <td class="p-4">
                    {{ $child->birth_date }}
                </td>

                {{-- Aksi --}}
                <td class="p-4">

                    <div class="flex gap-2">

                        {{-- EDIT --}}
                        <a href="{{ route('children.edit', $child->id) }}"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg">

                            Edit

                        </a>

                        {{-- DELETE --}}
                        <form action="{{ route('children.destroy', $child->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Hapus data ini?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">

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

                    Belum ada data anak

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection