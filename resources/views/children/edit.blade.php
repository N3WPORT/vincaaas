@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Edit Data Anak
</h1>

<div class="bg-white rounded-2xl shadow p-8">

    <form action="{{ route('children.update', $child->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-6">

            {{-- Nama --}}
            <div>

                <label class="block mb-2 font-medium">
                    Nama Anak
                </label>

                <input type="text"
                       name="name"
                       value="{{ $child->name }}"
                       class="w-full border rounded-xl px-4 py-3"
                       required>

            </div>

            {{-- Gender --}}
            <div>

                <label class="block mb-2 font-medium">
                    Gender
                </label>

                <select name="gender"
                        class="w-full border rounded-xl px-4 py-3">

                    <option value="L"
                        {{ $child->gender == 'L' ? 'selected' : '' }}>

                        Laki-laki

                    </option>

                    <option value="P"
                        {{ $child->gender == 'P' ? 'selected' : '' }}>

                        Perempuan

                    </option>

                </select>

            </div>

            {{-- Tanggal --}}
            <div>

                <label class="block mb-2 font-medium">
                    Tanggal Lahir
                </label>

                <input type="date"
                       name="birth_date"
                       value="{{ $child->birth_date }}"
                       class="w-full border rounded-xl px-4 py-3">

            </div>

            {{-- Berat --}}
            <div>

                <label class="block mb-2 font-medium">
                    Berat Lahir
                </label>

                <input type="number"
                       step="0.01"
                       name="birth_weight"
                       value="{{ $child->birth_weight }}"
                       class="w-full border rounded-xl px-4 py-3">

            </div>

        </div>

        <div class="mt-8">

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

                Update Data

            </button>

        </div>

    </form>

</div>

@endsection