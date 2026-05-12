@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Tambah Anak
</h1>

{{-- VALIDATION ERROR --}}
@if($errors->any())

<div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl mb-6">

    <ul class="list-disc pl-5">

        @foreach($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<div class="bg-white rounded-2xl shadow p-8">

    <form action="{{ route('children.store') }}"
          method="POST">

        @csrf

        <div class="grid grid-cols-2 gap-6">

            {{-- PILIH IBU --}}
            <div>

                <label class="block mb-2 font-medium">
                    Pilih Ibu
                </label>

                <select name="mother_id"
                        class="w-full border rounded-xl px-4 py-3"
                        required>

                    <option value="">
                        Pilih Ibu
                    </option>

                    @foreach($mothers as $mother)

                    <option value="{{ $mother->id }}"
                        {{ old('mother_id') == $mother->id ? 'selected' : '' }}>

                        {{ $mother->name }}

                    </option>

                    @endforeach

                </select>

            </div>

            {{-- NAMA --}}
            <div>

                <label class="block mb-2 font-medium">
                    Nama Anak
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       class="w-full border rounded-xl px-4 py-3"
                       required>

            </div>

            {{-- GENDER --}}
            <div>

                <label class="block mb-2 font-medium">
                    Gender
                </label>

                <select name="gender"
                        class="w-full border rounded-xl px-4 py-3"
                        required>

                    <option value="">
                        Pilih Gender
                    </option>

                    <option value="L"
                        {{ old('gender') == 'L' ? 'selected' : '' }}>

                        Laki-laki

                    </option>

                    <option value="P"
                        {{ old('gender') == 'P' ? 'selected' : '' }}>

                        Perempuan

                    </option>

                </select>

            </div>

            {{-- TANGGAL LAHIR --}}
            <div>

                <label class="block mb-2 font-medium">
                    Tanggal Lahir
                </label>

                <input type="date"
                       name="birth_date"
                       value="{{ old('birth_date') }}"
                       class="w-full border rounded-xl px-4 py-3"
                       required>

            </div>

            {{-- BERAT LAHIR --}}
            <div>

                <label class="block mb-2 font-medium">
                    Berat Lahir (kg)
                </label>

                <input type="number"
                       step="0.01"
                       name="birth_weight"
                       value="{{ old('birth_weight') }}"
                       class="w-full border rounded-xl px-4 py-3">

            </div>

        </div>

        {{-- BUTTON --}}
        <div class="mt-8">

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

                Simpan Data

            </button>

        </div>

    </form>

</div>

@endsection