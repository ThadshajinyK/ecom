@extends('layouts.backend.dashboard')
@section('content')

<div class="container">
    <div class="row col-md-12 col-md-offset-2 custyle">
        <h4 id="count"></h4>
        <table class="table table" style="margin-bottom:-40px; margin-top:0px;" id="table">
            <tr>
                <td> <h5> Categaries - {{ $categaries->count() }}</h5> </td>
                <td class="text-right"> <h5> <a href="{{ route('categary.create') }}" class="btn btn-primary" style="margin-bottom:0px; margin-left:70px; margin-bottom:10px;"><b>+</b> Add New Categary </a> </h5>
            </tr>
        </table>
        <table class="table table-striped custab" id="product_table">
                <thead id="tabelcontents">
                    <tr>
                        <th>ID</th>
                        <th>Categary Name</th>
                        <th> Show </th>
                        <th class="text-center"> Delete </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categaries as $categary)
                    <tr>
                        <td> {{ $categary->id }} </td>
                        <td> {{ $categary->categary_name }} </td>
                        <td>
                            <a href="{{ route('categary.show',$categary->id) }}"><i class="material-icons">done</i></a>
                        </td>
                        <td class="text-center">
                            <form action="{{route('categary.destroy',[$categary->id])}}" method="post">
                                @csrf   
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Do you want to delete?')"><i class="material-icons">delete</i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
        </table>
    </div>
</div>

@endsection