@extends('layouts.app')

@section('css')
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"></link>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-12 col-offset-0 ">
            <div class="panel panel-default ">
                <div class="panel-heading">Ajouter un produit</div>
                <div class="panel-body">
                    <form id="productsForm" action="/product/create" method="post" class="form-horizontal">
                        {{ csrf_field() }}

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
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
                        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="productName">Nommer</label>
                            <div class="col-sm-10">
                                <input id="productName" type="text" name="name" class="form-control" value="{{ old('name') }}"  required>
                            </div>
                        </div>
                        <div id="productName-danger" class="alert alert-danger" role="alert" hidden>
                            <i class="fa fa-exclamation" aria-hidden="true"></i>
                                Il doit manquer quelque chose ici.
                          <i class="fa fa-exclamation" aria-hidden="true"></i>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="priceunit">Prix <i class="fa fa-eur"></i></label>
                            <div class="col-sm-10">
                                <input id="priceunit" type="text" name="price" class="form-control" value="{{ old('price') }}"  required>
                            </div>
                        </div>
                        <div id="priceunit-danger" class="alert alert-danger" role="alert" hidden>
                            <i class="fa fa-exclamation" aria-hidden="true"></i>
                                Il doit manquer quelque chose ici.
                          <i class="fa fa-exclamation" aria-hidden="true"></i>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="detailDescription">Description</label>
                            <div class="col-sm-12">
                                <textarea id="detailDescription" type="text" name="detail" class="form-control" required> {{ old('detail') }}</textarea>
                            </div>
                        </div>
                        <div id="detailDescription-danger" class="alert alert-danger" role="alert" hidden>
                            <i class="fa fa-exclamation" aria-hidden="true"></i>
                                Il doit manquer quelque chose ici.
                            <i class="fa fa-exclamation" aria-hidden="true"></i> 
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <button id="subm" class="btn btn-success" type="submit"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter le produit</button>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Vos produits</div>
                <div class="panel-body">
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
                            <th colspan="2">
                                Actions
                            </th>
                        </thead>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    {{$product->name}}
                                </td>
                                <td>
                                    {{$product->description}} 
                                </td>
                                <td>
                                    {{$product->price}}<i class="fa fa-eur"></i>
                                </td>
                                <td hidden class="actionBtn-{{$product->id}}">
                                    <a href="/product/destroy/{{$product->id}}"><i class="fa fa-check"></i></a>
                                </td>
                                <td hidden class="actionBtn-{{$product->id}}">
                                    <i class="fa fa-times trash" data-id="{{$product->id}}"></i>
                                </td>
                                <td class="actionBtn-{{$product->id}}">
                                    <a href="/product/update/{{$product->id}}" class="edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    {{ csrf_field() }}
                                </td>
                                <td class="actionBtn-{{$product->id}}">
                                    <i class="fa fa-trash-o trash" data-id="{{$product->id}}"></i>
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
<script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
@endsection
