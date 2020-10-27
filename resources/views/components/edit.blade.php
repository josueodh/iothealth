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
            <form id="form-adicionar" action="{{ $update ?? '/' }}" method="post">
              @csrf
              @method('put')
              {{ $form ?? null }}
            </form>
        </div>
        <div class="card-footer">
        <button type="submit" form="form-adicionar" class="btn btn-dark float-right">Editar</button>
        </div>
    </div>
</div>