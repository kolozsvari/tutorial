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
                <th>Műveletek</th>
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

                    <td>
                        <a href="#" class="btn btn-sm btn-danger btn-delete-name" data-id="{{ $name->id }}">Törlés</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> 
</div>
@endsection

@section('script')
    <script>
        $(".btn-delete-name").on('click', function(){
            let thisBtn = $(this);
            let id = thisBtn.data('id');

            $.ajax({
                type: "POST",
                url: '/names/delete',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function(){
                    thisBtn.closest('tr').fadeOut();
                },
                error: function(){
                    alert('Nem sikerült a törlés!');
                }
            });
        });
    </script>
@endsection
