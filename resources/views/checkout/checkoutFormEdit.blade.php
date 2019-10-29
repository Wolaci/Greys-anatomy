@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-6">
                <div class="jumbotron p-3 bg-white rounded">
                    <h5>Editar checkup do paciente : <b>{{$patient[0]->name}}</b></h5>
                    <hr>
                    {!! Form::model($checkup, ['route'=>['hospital.update', $checkup->id],'method'=>'put','class' =>'form-group']) !!}
                        {!! Form::token() !!}
                            {{-- {!! Form::label('user', 'Paciente :') !!} --}}
                            {{-- {!! Form::select('user_id', $usersSelect, null, ['placeholder'=>'Mudar Paciente',  'class'=>'form-control', 'id'=>'user']) !!} --}}
                            <div class="row mt-1">
                                <div class="col">
                                    {!! Form::datetimeLocal('date', \Carbon\Carbon::now(),['class'=>'form-control', 'id'=>'date', 'required', 'hidden']) !!}
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col">
                                    {!! Form::label('height', 'Altura :') !!}
                                    {!! Form::number('height', null, ['step'=>0.01, 'min'=>0, 'class'=>'form-control', 'id'=>'height', 'required']) !!}
                                </div>
                                <div class="col">
                                    {!! Form::label('weight', 'Peso :') !!}
                                    {!! Form::number('weight', null, ['step'=>0.01, 'min'=>0, 'class'=>'form-control', 'id'=>'weight', 'required']) !!}
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col">
                                    {!! Form::label('blood_pressure', 'Pressão Arterial :') !!}
                                    {!! Form::text('blood_pressure',null,['class'=>'form-control', 'id'=>'pressure', 'required']) !!}
                                </div>
                                <div class="col">
                                    {!! Form::label('glicose_level', 'Nível de Glicose :') !!}
                                    {!! Form::number('glucose_level', null, ['class'=>'form-control', 'min'=>'0', 'id'=>'glicouse', 'required']) !!}
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col">
                                    {!! Form::label('ldl', 'Colesterol LDL :') !!}
                                    {!! Form::number('ldl',null,['step'=>0.01,'class'=>'form-control', 'id'=>'cholesterol_bad', 'required']) !!}
                                </div>
                                <div class="col">
                                    {!! Form::label('hdl', 'Colesterol HDL :') !!}
                                    {!! Form::number('hdl', null, ['step'=>0.01,'class'=>'form-control', 'min'=>'0','id'=>'cholesterol_good', 'required']) !!}
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
                </div>
            </div>
        </div>
    </div>
@endsection
