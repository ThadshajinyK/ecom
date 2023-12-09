@extends('layouts.backend.dashboard')
@section('content')

<div class="container">
    <div class="row col-md-12 col-md-offset-2 custyle">
        <h4 id="count"></h4>
        <table class="table table" style="margin-bottom:-40px; margin-top:0px;" id="table">
            <tr>
                <td> <h5> Shippings - {{ $shippings->count() }}</h5> </td> <br><br>
            </tr>
        </table>
        <table class="table table-striped custab" id="product_table">
                <thead id="tabelcontents">
                    <tr>
                        <th>ID</th>
                        <th> Customer </th>
                        <th> Order id </th>
                        <th> Shipping to </th>
                        <th> Phone </th>
                        <th class="text-center" style="width:115px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shippings as $ship)
                        <tr>
                            <td> {{ $ship->id }} </td>
                            <td> <a href="" class="btn btn-success"> {{ $ship->user->id }} </a></td>
                            <td>
                                @foreach($ship->orders as $s)
                                    {{ $s->id }} 
                                @endforeach
                            </td>
                            <td>  {{ $ship->province }} , {{ $ship->district }} , {{ $ship->area }} , {{ $ship->address }} </td>
                            <td> {{ $ship->phone_no }} </td>
                            <td class="text-left">
                                <form action="{{route('shipping.destroy',[$ship->id])}}" method="post">
                                    @csrf   
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Do you want to delete?')"><span class="fa fa-trash"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>

@endsection