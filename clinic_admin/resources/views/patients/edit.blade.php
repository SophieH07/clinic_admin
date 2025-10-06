@extends('layouts.app')

@section('content')
    <h1>Beteg adatainak szerkesztése: {{ $patient->name }}</h1>

    <form action="{{ route('patients.update', $patient) }}" method="POST">
        @csrf
        @method('PUT')

        <x-form-input name="name" label="Beteg neve" :value="$patient->name" />
        <x-form-input name="email" type="email" label="Email cím" :value="$patient->email" />
        <x-form-input name="phone_number" label="Telefonszám" :value="$patient->phone_number" />
        <x-form-input name="address" label="Lakcím" :value="$patient->address" />

        <button type="submit">Módosítások mentése</button>

    </form>
    <button style="margin-top: 1rem;" onclick="window.location='{{ route('patients.index') }}'">Vissza a
        betegekhez</button>
@endsection
