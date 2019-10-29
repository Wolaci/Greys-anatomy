@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-6">
                <div class="jumbotron p-3 bg-white rounded">
                    <h5>Cadastrar Checkup de Pacientes :</h5>
                    <hr>
                    {!! Form::open(['route'=>['hospital.store'], 'class' =>'form-group']) !!}
                        {!! Form::token() !!}
                            {!! Form::label('user', 'Paciente :') !!}
                            {!! Form::select('user_id', $usersSelect, null, ['placeholder'=>'Selecione o Paciente',  'class'=>'form-control', 'id'=>'user']) !!}
                            <div class="row mt-1">
                                <div class="col">
                                    {{-- {!! Form::label('date', 'Data :') !!} --}}
                                    {!! Form::datetimeLocal('date', \Carbon\Carbon::now(),['class'=>'form-control', 'id'=>'date', 'required', 'hidden']) !!}
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col">
                                    {!! Form::label('height', 'Altura :') !!}
                                    {!! Form::number('height', '0.00', ['step'=>0.01, 'min'=>0, 'class'=>'form-control', 'id'=>'height', 'required']) !!}
                                </div>
                                <div class="col">
                                    {!! Form::label('weight', 'Peso :') !!}
                                    {!! Form::number('weight', '0.00', ['step'=>0.01, 'min'=>0, 'class'=>'form-control', 'id'=>'weight', 'required']) !!}
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col">
                                    {!! Form::label('pressure', 'Pressão Arterial :') !!}
                                    {!! Form::text('pressure',null,['class'=>'form-control', 'id'=>'pressure', 'required']) !!}
                                </div>
                                <div class="col">
                                    {!! Form::label('glicouse', 'Nível de Glicose :') !!}
                                    {!! Form::number('glicouse', '0', ['class'=>'form-control', 'min'=>'0', 'id'=>'glicouse', 'required']) !!}
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col">
                                    {!! Form::label('cholesterol_bad', 'Colesterol LDL :') !!}
                                    {!! Form::number('cholesterol_bad','0.00',['step'=>0.01,'class'=>'form-control', 'id'=>'cholesterol_bad', 'required']) !!}
                                </div>
                                <div class="col">
                                    {!! Form::label('cholesterol_good', 'Colesterol HDL :') !!}
                                    {!! Form::number('cholesterol_good', '0.00', ['step'=>0.01,'class'=>'form-control', 'min'=>'0','id'=>'cholesterol_good', 'required']) !!}
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col">
                                    {!! Form::label('observation', 'Observação :') !!}
                                    {!! Form::textarea('observation', null, ['class'=>'form-control', 'rows'=>2, 'cols'=>33, 'required']) !!}
                                </div>
                            </div>
                        {!! Form::submit('Cadastrar', ['class'=>'btn btn-success mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column">
                    @if($errors->any())
                        <div class="flex-row" style="flex:1 0 auto;">
                            <div class="jumbotron p-2" style="border-left: 12px solid #FFA8A8;background-color:#FFF5F5;">
                                <h5><i class="far fa-times-circle"></i>Deu Ruimm!</h5>
                                @foreach ($errors->all() as $error)
                                    <p><i class="fas fa-times"></i>{{$error}}</p>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="flex-row" style="flex:1 0 auto;">
                            <div class="jumbotron p-2" style="border-left: 12px solid #78fc71;background-color:#e8ffe8">
                                <h5><i class="far fa-check-circle"></i>{{ session('success') }}</h5>
                            </div>
                        </div>
                    @endif
                    <div class="flex-row" style="flex:1 0 auto;">
                        <div class="jumbotron p-3 bg-white rounded">
                            <h5>Checkup Realizados :</h5>
                            <hr>
                            @if($countCheckups > 0)
                                @foreach ($userWithCheckup as $item)
                                    @foreach ($item['checkups'] as $checkup)
                                        <div class="card mt-2" style="border:none;">
                                            <div class="card-body">
                                                <h5 class="card-title"><b>{{$item->name." - Checkup"}}</b></h5>
                                                <p class="card-text"><b>Data da Checagem :</b> {{$checkup->checkouted_at}}</p>
                                                <p class="card-text"><b>Observação :</b> {{$checkup->observation}}</p>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    {!! link_to_route('hospital.show', 'Show', $checkup->id, ['class'=>'btn btn-primary']) !!}
                                                    {!! link_to_route('hospital.edit', 'Edit', $checkup->id, ['class'=>'btn btn-primary']) !!}
                                                    {!! Form::open(['route'=>['hospital.destroy', $checkup->id], 'method'=>'DELETE']) !!}
                                                        {!! Form::submit('Deletar', ['class'=>'btn btn-danger ml-2']) !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                    @endforeach
                                @endforeach
                            @else
                                <h5>Você ainda não realizou Checkups :/</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
