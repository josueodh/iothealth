@extends('layouts.master')

@section('content')
    @component('components.show')
        @slot('title','Detalhes  da medição')
        @slot('back', url()->previous())
        @slot('form')
            @include('measurements.form')
        @endslot
    @endcomponent
@endsection

@push('scripts')
    <script>
        $('.form-control').attr('disabled',true);
    </script>
@endpush