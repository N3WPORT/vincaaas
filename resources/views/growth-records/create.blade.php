@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Input Pertumbuhan Anak
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

    <form action="{{ route('growth-records.store') }}"
          method="POST">

        @csrf

        <div class="grid grid-cols-2 gap-6">

            {{-- PILIH ANAK --}}
            <div>

                <label class="block mb-2 font-medium">
                    Pilih Anak
                </label>

                <select name="child_id"
                        class="w-full border rounded-xl px-4 py-3"
                        required>

                    <option value="">
                        Pilih Anak
                    </option>

                    @foreach($children as $child)

                    <option value="{{ $child->id }}">

                        {{ $child->name }}

                    </option>

                    @endforeach

                </select>

            </div>

            {{-- BERAT --}}
            <div>

                <label class="block mb-2 font-medium">
                    Berat Badan (kg)
                </label>

                <input type="number"
                       step="0.01"
                       name="weight"
                       class="w-full border rounded-xl px-4 py-3"
                       required>

            </div>

            {{-- TINGGI --}}
            <div>

                <label class="block mb-2 font-medium">
                    Tinggi Badan (cm)
                </label>

                <input type="number"
                       step="0.01"
                       name="height"
                       class="w-full border rounded-xl px-4 py-3"
                       required>

            </div>

            {{-- TANGGAL --}}
            <div>

                <label class="block mb-2 font-medium">
                    Tanggal Pemeriksaan
                </label>

                <input type="date"
                       name="measurement_date"
                       class="w-full border rounded-xl px-4 py-3"
                       required>

            </div>

            {{-- CATATAN --}}
            <div class="col-span-2">

                <label class="block mb-2 font-medium">
                    Catatan
                </label>

                <textarea name="notes"
                          rows="4"
                          class="w-full border rounded-xl px-4 py-3"></textarea>

            </div>

        </div>

        {{-- BUTTON --}}
        <div class="mt-8">

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl shadow-lg">

                Simpan Data

            </button>

        </div>

    </form>

</div>

@endsection