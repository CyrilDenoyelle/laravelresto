@extends('layouts.app')

@section('css')
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"></link>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-12 col-offset-0 ">
            <div class="panel panel-default">
                <div class="panel-heading">Commande</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead class="thead thead-light">
                            <th>
                                Nom
                            </th>
                            <th>
                                nombre
                            </th>
                            <th>
                                Prix/u
                            </th>
                            <th>
                                Prix total
                            </th>
                        </thead>
                        <tbody id="orderRender">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Produits proposés</div>
                    <table class="table table-striped">
                        <thead class="thead thead-light">
                            <th>
                                Nom
                            </th>
                            <th>
                                Description
                            </th>
                            <th>
                                Prix/u
                            </th>
                            {{-- <th>
                                Actions
                            </th> --}}
                        </thead>
                        @foreach ($products as $product)
                            <tr>
                                <td class="name" data-text="{{$product->name}}">
                                    {{$product->name}}
                                </td>
                                <td class="description" data-text="{{$product->description}}">
                                    {{$product->description}}
                                </td>
                                <td class="price" data-text="{{$product->price}}">
                                    {{$product->price}}<i class="fa fa-eur"></i>
                                </td>
                                <td>
                                    <i class="fa fa-plus add"></i>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('js/order.js') }}"></script>
@endsection
