@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Edit Data Ibu
</h1>

<div class="bg-white rounded-2xl shadow p-8">

    <form action="{{ route('mothers.update', $mother->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-6">

            {{-- Nama --}}
            <div>

                <label class="block mb-2 font-medium">
                    Nama Ibu
                </label>

                <input type="text"
                       name="name"
                       value="{{ $mother->name }}"
                       class="w-full border rounded-xl px-4 py-3"
                       required>

            </div>

            {{-- NIK --}}
            <div>

                <label class="block mb-2 font-medium">
                    NIK
                </label>

                <input type="text"
                       name="nik"
                       value="{{ $mother->nik }}"
                       class="w-full border rounded-xl px-4 py-3"
                       required>

            </div>

            {{-- Telepon --}}
            <div>

                <label class="block mb-2 font-medium">
                    Telepon
                </label>

                <input type="text"
                       name="phone"
                       value="{{ $mother->phone }}"
                       class="w-full border rounded-xl px-4 py-3">

            </div>

        </div>

        <div class="mt-8">

            <button type="submit"
                    class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-3 rounded-xl">

                Update Data

            </button>

        </div>

    </form>

</div>

@endsection