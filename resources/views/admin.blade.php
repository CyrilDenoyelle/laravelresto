@extends('layouts.app')

@section('css')
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"></link>
@endsection

@section('content')
<div class="container containerPadd">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-12 col-offset-0 ">
            <div class="panel panel-default">
                <div class="panel-heading">Add</div>
                <div class="panel-body">
                    <form id="productsForm" action="/product/create" method="post" class="form-horizontal">
                        {{ csrf_field() }}

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                              {{ $errors->first() }}
                            </div>
                        @endif
                        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="productName">Nommer</label>
                            <div class="col-sm-10">
                                <input id="productName" type="text" name="name" class="form-control" value="" required>
                            </div>
                        </div>
                        <div id="productName-danger" class="alert alert-danger" role="alert" hidden>
                            <i class="fa fa-exclamation" aria-hidden="true"></i>
                                Il doit manquer quelque chose ici.
                          <i class="fa fa-exclamation" aria-hidden="true"></i>
                        </div>
                        {{-- <div id="productName-success" class="alert alert-success" role="alert" hidden>
                          This is a success alert—check it out!
                        </div> --}}
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="priceunit">Prix</label>
                            <div class="col-sm-10">
                                <input id="priceunit" type="text" name="price" class="form-control" value="" required>
                            </div>
                        </div>
                        <div id="priceunit-danger" class="alert alert-danger" role="alert" hidden>
                            <i class="fa fa-exclamation" aria-hidden="true"></i>
                                Il doit manquer quelque chose ici.
                          <i class="fa fa-exclamation" aria-hidden="true"></i>
                        </div>
                        {{-- <div id="priceunit-success" class="alert alert-success" role="alert" hidden>
                          This is a success alert—check it out!
                        </div> --}}
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="detailDescription">Description</label>
                            <div class="col-sm-12">
                                <textarea id="detailDescription" type="text" name="detail" class="form-control" required> </textarea>
                            </div>
                        </div>
                        <div id="detailDescription-danger" class="alert alert-danger" role="alert" hidden>
                            <i class="fa fa-exclamation" aria-hidden="true"></i>
                                Il doit manquer quelque chose ici.
                            <i class="fa fa-exclamation" aria-hidden="true"></i> 
                        </div>
                        {{-- <div id="detailDescription-success" class="alert alert-success" role="alert" hidden>
                          This is a success alert—check it out!
                        </div> --}}
                    </form>
                </div>
                <div class="panel-footer">
                    <button id="subm" class="btn btn-success" type="submit"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter le produit</button>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <ul>
                        <li>produi1</li>
                        <li>produi2</li>
                        <li>produi3</li>
                        <li>produi4</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
@endsection
