@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Detail Data Ibu
</h1>

{{-- CARD PROFILE --}}
<div class="bg-white rounded-2xl shadow p-8 mb-8">

    <div class="grid grid-cols-2 gap-6">

        {{-- Nama --}}
        <div>

            <p class="text-gray-500 mb-1">
                Nama Ibu
            </p>

            <h2 class="text-2xl font-bold">
                {{ $mother->name }}
            </h2>

        </div>

        {{-- NIK --}}
        <div>

            <p class="text-gray-500 mb-1">
                NIK
            </p>

            <h2 class="text-xl">
                {{ $mother->nik }}
            </h2>

        </div>

        {{-- Telepon --}}
        <div>

            <p class="text-gray-500 mb-1">
                Telepon
            </p>

            <h2 class="text-xl">
                {{ $mother->phone ?? '-' }}
            </h2>

        </div>

        {{-- Total Anak --}}
        <div>

            <p class="text-gray-500 mb-1">
                Total Anak
            </p>

            <h2 class="text-xl font-bold text-pink-600">
                {{ $mother->children->count() }}
            </h2>

        </div>

    </div>

</div>

{{-- LIST ANAK --}}
<div class="bg-white rounded-2xl shadow overflow-hidden">

    <div class="p-6 border-b">

        <h2 class="text-2xl font-bold">
            Daftar Anak
        </h2>

    </div>

    <table class="w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="p-4 text-left">
                    Nama Anak
                </th>

                <th class="p-4 text-left">
                    Gender
                </th>

                <th class="p-4 text-left">
                    Tanggal Lahir
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($mother->children as $child)

            <tr class="border-t hover:bg-gray-50">

                {{-- Nama --}}
                <td class="p-4">
                    {{ $child->name }}
                </td>

                {{-- Gender --}}
                <td class="p-4">

                    @if($child->gender == 'L')

                        Laki-laki

                    @else

                        Perempuan

                    @endif

                </td>

                {{-- Tanggal --}}
                <td class="p-4">
                    {{ $child->birth_date }}
                </td>

            </tr>

            @empty

            <tr>

                <td colspan="3"
                    class="p-6 text-center text-gray-500">

                    Belum ada data anak

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection