@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Edit Data Pertumbuhan
</h1>

{{-- ERROR --}}
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

    <form action="{{ route('growth-records.update', $growthRecord->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-6">

            {{-- ANAK --}}
            <div>

                <label class="block mb-2 font-medium">
                    Pilih Anak
                </label>

                <select name="child_id"
                        class="w-full border rounded-xl px-4 py-3">

                    @foreach($children as $child)

                    <option value="{{ $child->id }}"
                        {{ $growthRecord->child_id == $child->id ? 'selected' : '' }}>

                        {{ $child->name }}

                    </option>

                    @endforeach

                </select>

            </div>

            {{-- BERAT --}}
            <div>

                <label class="block mb-2 font-medium">
                    Berat Badan
                </label>

                <input type="number"
                       step="0.01"
                       name="weight"
                       value="{{ $growthRecord->weight }}"
                       class="w-full border rounded-xl px-4 py-3">

            </div>

            {{-- TINGGI --}}
            <div>

                <label class="block mb-2 font-medium">
                    Tinggi Badan
                </label>

                <input type="number"
                       step="0.01"
                       name="height"
                       value="{{ $growthRecord->height }}"
                       class="w-full border rounded-xl px-4 py-3">

            </div>

            {{-- TANGGAL --}}
            <div>

                <label class="block mb-2 font-medium">
                    Tanggal Pemeriksaan
                </label>

                <input type="date"
                       name="measurement_date"
                       value="{{ $growthRecord->measurement_date }}"
                       class="w-full border rounded-xl px-4 py-3">

            </div>

            {{-- CATATAN --}}
            <div class="col-span-2">

                <label class="block mb-2 font-medium">
                    Catatan
                </label>

                <textarea name="notes"
                          rows="4"
                          class="w-full border rounded-xl px-4 py-3">{{ $growthRecord->notes }}</textarea>

            </div>

        </div>

        {{-- BUTTON --}}
        <div class="mt-8">

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl shadow-lg">

                Update Data

            </button>

        </div>

    </form>

</div>

@endsection