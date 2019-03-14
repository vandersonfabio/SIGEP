@extends('layouts.admin');
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nova Unidade</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'unidade','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}         
            <div class="form-group">
            	<label for="sigla">Sigla</label>
            	<input type="text" name="sigla" class="form-control" placeholder="Sigla da Unidade...">
            </div>   
            <div class="form-group">
            	<label for="descricao">Descrição</label>
            	<input type="text" name="descricao" class="form-control" placeholder="Descrição da Unidade...">
            </div>
            <div class="form-group">
            	<label for="unidade_superior">Unidade Superior (se houver)</label>
            	<input type="text" name="unidade_superior" class="form-control" placeholder="Descrição da Unidade Superior...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Salvar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@stop