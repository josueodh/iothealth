<div class="card">
    <div class="card-header">

      <h3 class="float-left m-0 table-title">{{ $title ?? null }}</h3>
      <div class="float-right mr-2">
          <a href="{{ $create ?? null }}">
              <button type="button" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Adicionar</button>
          </a>
      </div>
    </div>
    <div class="card-body table-responsive">
      <table class="table table-hover table-striped projects dataTable">
          <thead>
              <tr>
                {{ $header ?? null}}
              </tr>
          </thead>
          <tbody>
              {{ $body  ?? null }}
          </tbody>
      </table>
    </div>
</div>