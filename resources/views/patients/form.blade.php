<div class="row">
    <div class="form-group col-sm-12 col-md-6">
        <label for="name">Nome </label>
        <input type="text" name="name" id="name" autofocus class="form-control @error('name') is-invalid @enderror" required value="{{ old('name',$patient->name) }}">
        @error('name')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-sm-12 col-md-6">
        <label for="born_date">Data de Nascimento </label>
        @if ((Route::is('patients.edit') || Route::is('patients.show')) && isset($patient->born_date))
            <input type="date" name="born_date" class="form-control @error('born_date') is-invalid @enderror" value="{{ old('born_date', date('Y-m-d',strtotime($patient->born_date))) }}">    
        @else
            <input type="date" name="born_date" class="form-control @error('born_date') is-invalid @enderror" value="{{ old('born_date') }}">
        @endif
        @error('born_date')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="form-group col-sm-12">
        <label for="phone">Telefone </label>
        <input type="phone" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" required value="{{ old('phone',$patient->phone) }}">
        @error('phone')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-12 form-group">
        <label for="cid_id">CID</label>
        <input type="text" name="cid_id" id="cid_id" placeholder="Digite o código separado por ," class="form-control @error('cid_id') is-invalid @enderror" required value="{{ old('cid_id',$patient->cid_id) }}">
        @error('cid_id')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-12 form-group">
        <label for="pathology">Patologia</label>
        <textarea name="pathology" id="pathology" class="form-control @error('pathology') is-invalid @enderror" cols="30" required rows="5">{{ old('pathology', $patient->pathology) }}</textarea>
        @error('pathology')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="form-group col-sm-12 col-md-6">
        <label for="cep">CEP </label>
        <input type="text" name="cep" id="cep" class="form-control @error('cep') is-invalid @enderror" required value="{{ old('cep',$patient->cep) }}">
        @error('cep')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="form-group col-sm-12 col-md-6">
        <label for="street">Rua </label>
        <input type="text" name="street" id="street" class="form-control @error('street') is-invalid @enderror" required value="{{ old('street',$patient->street) }}">
        @error('street')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="form-group col-sm-12 col-md-2">
        <label for="number">Número </label>
        <input type="number" step="1" name="number" id="number" class="form-control @error('number') is-invalid @enderror" required value="{{ old('number' , $patient->number) }}">
        @error('number')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="form-group col-sm-12 col-md-4">
        <label for="complement">Complemento </label>
        <input type="text" name="complement" id="complement" class="form-control @error('complement') is-invalid @enderror"  value="{{ old('complement',$patient->complement) }}">
        @error('complement')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="form-group col-sm-12 col-md-6">
        <label for="neighborhood">Bairro </label>
        <input type="text" name="neighborhood" id="neighborhood" class="form-control @error('neighborhood') is-invalid @enderror" required value="{{ old('neighborhood' , $patient->neighborhood) }}">
        @error('neighborhood')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="form-group col-sm-12 col-md-6">
        <label for="city">Cidade </label>
        <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" required value="{{ old('city' , $patient->city) }}">
        @error('city')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="form-group col-sm-12 col-md-6">
        <label for="state">Estado </label>
        <input type="text" name="state" id="state" class="form-control @error('state') is-invalid @enderror" required value="{{ old('state',$patient->state) }}">
        @error('state')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
</div>

@push('scripts')
    <script>
        var behavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 0 0000-0000' : '(00) 0000-00009';
        },
            options = {
                onKeyPress: function (val, e, field, options) {
                    field.mask(behavior.apply({}, arguments), options);
                }
            };

        $('#phone').mask(behavior, options);
        $('#cep').mask('00000-000');
        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#street").val("");
                $("#neighborhood").val("");
                $("#city").val("");
                $("#number").val("");
            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#street").val("...");
                        $("#neighborhood").val("...");
                        $("#city").val("...");
                        $("#state").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#street").val(dados.logradouro);
                                $("#neighborhood").val(dados.bairro);
                                $("#city").val(dados.localidade);
                                $("#number").val(dados.localidade);
                                $("#state").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    </script>
@endpush