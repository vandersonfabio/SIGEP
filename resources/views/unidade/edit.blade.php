@extends('layouts.admin');
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Unidade: <b>{{ $unidade->sigla }}</b></h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($unidade, ['method'=>'PATCH', 'route'=>['unidade.update', $unidade->id]])!!}
			{{Form::token()}}
            
            <div class="form-group">
            	<label for="sigla">Sigla</label>
            	<input type="text" name="sigla" class="form-control"
            	value="{{ $unidade->sigla }}"
            	 placeholder="Sigla da Unidade">
            </div>
            <div class="form-group">
            	<label for="descricao">Descrição</label>
            	<input type="text" name="descricao" class="form-control"
            	value="{{ $unidade->descricao }}"
            	 placeholder="Descrição...">
            </div>
            <div class="form-group">
            	<label for="unidade_superior">Unidade Superior (se houver)</label>
            	<input type="text" name="unidade_superior" class="form-control"
            	value="{{ $unidade->unidade_superior }}"
            	 placeholder="Descrição da unidade superior">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Salvar</button>
            	<button class="btn btn-cancel" type="reset">Desfazer</button>
                <button class="btn btn-danger" type="button" onClick="history.go(-1)">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@stop