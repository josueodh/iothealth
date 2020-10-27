<div class="col-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
          <h3 class="float-left m-0 table-title">{{ $title ?? null }}</h3>
          <div class="float-right mr-2">
              <a href="{{ $back ?? null }}">
                  <button type="button" class="btn btn-dark"><i class="fas fa-undo"></i> Voltar</button>
              </a>
          </div>
        </div>
        <div class="card-body">
            {{ $form ?? null }}
        </div>
        <div class="card-footer">
        </div>
    </div>
</div>

@push('scripts')
<script>
    $('.form-control').attr('disabled',true);
</script>
@endpush