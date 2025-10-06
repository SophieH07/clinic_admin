@extends('layouts.app')

@section('content')
    <h1>{{ $patient->name }} adatlapja</h1>
    <p><strong>Email:</strong> {{ $patient->email }}</p>
    <p><strong>Telefonszám:</strong> {{ $patient->phone_number ?? 'Nincs megadva' }}</p>
    <p><strong>Lakcím:</strong> {{ $patient->address ?? 'Nincs megadva' }}</p>

    <hr>

    <h2>Korábbi vizitek</h2>
    @if ($patient->visits->isNotEmpty())
        <table>
            <thead>
                <tr>
                    <th>Időpont</th>
                    <th>Ok</th>
                    <th>Jegyzetek</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patient->visits as $visit)
                    <tr>
                        <td>{{ $visit->visit_date }}</td>
                        <td>{{ $visit->reason }}</td>
                        <td>{{ $visit->notes }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nincsenek rögzített vizitek.</p>
    @endif
@endsection
