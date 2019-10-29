@extends('layouts.app')

@section('content')
    <div class="container justify-content-between-center">
        <div class="row ">
            <hr>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Data do Checkup</th>
                    <th scope="col">Pressão Arterial</th>
                    <th scope="col">Nível de Glicose</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Altura</th>
                    <th scope="col">Colesterol - LDL</th>
                    <th scope="col">Colesterol - HDL</th>
                    <th scope="col">Observação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($checkup as $item)
                        <tr style="text-align:left">
                            <td>{{$item->name}}</td>
                            <td>{{$checkup->checkouted_at}}</td>
                            <td>{{$checkup->blood_pressure}}</td>
                            <td>{{$checkup->glucose_level}}</td>
                            <td>{{$checkup->weight}}</td>
                            <td>{{$checkup->height}}</td>
                            <td>{{$checkup->ldl}}</td>
                            <td>{{$checkup->hdl}}</td>
                            <td>{{$checkup->observation}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
