@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title','Usuários')
        @slot('create', route('users.create'))
        @slot('header')
            <th>Nome</th>
            <th>E-mail</th>
            <th>Administrador</th>
            <th></th>
        @endslot
        @slot('body')
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin ? 'Sim' : 'Não' }}</td>
                    <td class="button-index">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <form class="form-delete" action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Nenhuma usuário encontrado</td>
                </tr>
            @endforelse
        @endslot
    @endcomponent
@endsection
@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>            
@endpush