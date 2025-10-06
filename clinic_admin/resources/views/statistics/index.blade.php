@extends('layouts.app')

@section('content')
    <h1>Statisztika</h1>

    <h3>Alap mutatók</h3>
    <p><strong>Vizitek száma ezen a héten:</strong> {{ $weeklyVisitCount }}</p>

    <hr>

    <h3>Legutóbbi 5 vizit</h3>
    <ul>
        @forelse($latestVisits as $visit)
            <li>{{ $visit->patient->name }} - {{ \Carbon\Carbon::parse($visit->visit_date)->format('Y-m-d') }} (Ok:
                {{ $visit->reason }})</li>
        @empty
            <li>Nincsenek vizitek.</li>
        @endforelse
    </ul>

    <hr>

    <h3>Leggyakoribb vizit okok</h3>
    <ul>
        @forelse($topReasons as $reason)
            <li>{{ $reason->reason }}: {{ $reason->total }} alkalommal</li>
        @empty
            <li>Nincsenek vizit okok.</li>
        @endforelse
    </ul>
@endsection
