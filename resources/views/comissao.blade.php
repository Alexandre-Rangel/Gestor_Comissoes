@extends('layouts.header')

@section('header')

{{-- Inserir/Alterar e Deletar usam essa mesma modal --}}

<div class="modal fade" id="Tela" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titulo_tela01"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form id="formulario">
          @csrf
          <input class="form-control" name="id" id="id" type="hidden">
          <div class="form-group col-lg-15">
            <label for="usuario">Descrição</label>
            <input class="form-control" required name="descricao" id="descricao" type="text">
          </div>
          <div class="form-group col-lg-15">
            <label for="usuario">Valor</label>
            <input class="form-control" required name="valor" id="valor" type="text">
          </div>



        </form>

      </div>
      <div class="modal-footer">
        <button type="button" onblur="salvar_mudancas()" data-dismiss="modal" class="btn btn-primary">Confirmar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

      </div>
    </div>
  </div>
</div>



<a href="#Tela" id="inserir_alterar" class="btn white btn-success " onblur="Inserir()" data-toggle="modal"><i class="fa fa-plus"></i> Incluir</a>


<div id="grid"></div>
<div id="details"></div>


<script src="js/Comissao/Comissao_Grid.js"></script>
<script src="js/Comissao/Comissao_CRUD.js"></script>


@endsection