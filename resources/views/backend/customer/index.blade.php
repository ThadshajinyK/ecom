@extends('layouts.backend.dashboard')
@section('content')

<div class="container">
    <div class="row col-md-12 col-md-offset-2 custyle">
        <h4 id="count"></h4>
        <table class="table table" style="margin-bottom:-40px; margin-top:0px;" id="table">
            <tr>
                <td> <h5> Customer - {{ $user->count() }}</h5> </td>
                <br><br>
            </tr>
        </table>
        <table class="table table-striped custab" id="customer_table">
                <thead id="tabelcontents">
                    <tr>
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th> Email </th>
                        <th> Show </th>
                        <th> Delete </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($user as $customer)
                    <tr>
                        <td> {{ $customer->id }} </td>
                        <td> {{ $customer->fname }} {{ $customer->lname }}</td>
                        <td> {{ $customer->email }} </td>
                        <td>
                            <a href="{{ route('customer.show',$customer->id) }}"><i class="material-icons">done</i></a>
                        </td>
                        <td class="text-center">
                            <form action="{{route('customer.destroy',[$customer->id])}}" method="post">
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