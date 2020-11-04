@if(session('success'))
    @push('scripts')
        <script>
             Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Ação concluida com sucesso!',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endpush
@endif
