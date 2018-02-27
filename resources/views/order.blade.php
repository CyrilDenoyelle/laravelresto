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
                @if ($errors->any())
                            <div id="error" class="alert alert-danger" role="alert">
                            <i class="fa fa-exclamation" aria-hidden="true"></i>
                              {{ $errors->first() }}
                            <i class="fa fa-exclamation" aria-hidden="true"></i>
                            </div>
                        @endif
                        @if (session('message'))
                            <div id="message" class="alert alert-success" role="alert" data-statut="{{ session('statut') }}">
                                <i class="fa fa-exclamation" aria-hidden="true"></i> {{ session('message') }} <i class="fa fa-exclamation" aria-hidden="true"></i>
                            </div>
                        @endif
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
                            <th colspan="2">
                            </th>
                        </thead>
                        <tbody id="orderRender">
                        </tbody>
                        <tr>
                            <td><a class="btn btn-success btn-lg btn-block" role="button" id="submit">Commander</a></td>
                            <td>
                                <a class="btn btn-danger btn-lg btn-block" role="button" id="suppr">suppr</a>
                            </td>
                            <td></td>
                            <td id="total"></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                    <form id="orderForm" method="post" action="/commande/create" hidden>
                        {{ csrf_field() }}
                        <input type="text" name="orderObj" id="orderObj">
                    </form>
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
                                <td class="id" data-text="{{$product->id}}" hidden>
                                    {{$product->id}}
                                </td>
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
