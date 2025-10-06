@extends('layouts.app')

@section('content')
    <div x-data="{ open: {{ $errors->any() ? 'true' : 'false' }} }">
        <h1>Betegek</h1>

        <div style="margin-bottom: 1rem;">
            <button @click="open = !open">Új beteg felvétele</button>
        </div>

        <div x-show="open" style="padding: 2rem; background: #f9f9f9; margin-bottom: 2rem; border: 1px solid #ddd;">
            <h2>Új beteg adatai</h2>
            <form action="{{ route('patients.store') }}" method="POST">
                @csrf
                <x-form-input name="name" label="Beteg neve" />
                <x-form-input name="email" type="email" label="Email cím" />
                <x-form-input name="phone_number" label="Telefonszám" />
                <x-form-input name="address" label="Lakcím" />
                <button type="submit">Beteg mentése</button>
            </form>
        </div>

        <div class="patient-list">
            <h2>Betegek listája</h2>
            <form method="GET" action="{{ route('patients.index') }}">
                <input type="text" name="search" placeholder="Keresés név vagy email alapján..."
                    value="{{ request('search') }}">
                <button type="submit">Keresés</button>
            </form>

            <table>
                <thead>
                    <tr>
                        <th>Név</th>
                        <th>Email</th>
                        <th>Műveletek</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($patients as $patient)
                        <tr>
                            <td><a href="{{ route('patients.show', $patient) }}">{{ $patient->name }}</a></td>
                            <td>{{ $patient->email }}</td>
                            <td class="actions-cell">
                                <a href="{{ route('patients.edit', $patient) }}">Szerkesztés</a>
                                <form method="POST" action="{{ route('patients.destroy', $patient) }}"
                                    onsubmit="return confirm('Biztosan törölni szeretnéd?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        style="background:crimson; color:white; border:none; padding: 4px 8px; cursor:pointer;">Törlés</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Nincsenek betegek az adatbázisban.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $patients->links() }}
        </div>
    </div>
@endsection
