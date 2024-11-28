@extends('layouts.app')
@section('title', '| Nevek')

@section('content')
<div class="container">

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Azonosító</th>
                <th>Név</th>
                <th>Családnév</th>
                <th>Létrehozás</th>
            </tr>
        </thead>
        <tbody>
            @foreach($names as $name)
                <tr>
                    <td>{{ $name->id }}</td>
                    @empty($name->family)
                        <td><strong>Nincs adat.</strong></td>
                    @else
                        <td>{{ $name->family->surname }}</td>
                    @endempty
                    <td>{{ $name->name }}</td>

                    <td>{{ $name->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

   
</div>
@endsection
