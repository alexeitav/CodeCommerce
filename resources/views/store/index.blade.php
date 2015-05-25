@extends('store.store')
@section('categories')

    @include('store.partials.category')

@stop

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Em destaque</h2>

            @foreach($featureds as $featured)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">



                                @if(count($featured->images))
                                    <img src="{{ url('uploads/'.$featured->images->first()->id.'.'.$featured->images->first()->extension) }}" alt="" width="200px" />
                                @else
                                    <img src="{{ url('images/no-img.jpg') }}" alt="" width="200px" />
                                @endif


                                <h2>R$ {{ $featured->price }}</h2>
                                <p>{{ $featured->name }}</p>
                                <a href="" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>R$ {{ $featured->price }}</h2>
                                    <p>{{ $featured->name }}</p>
                                    <a href="" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                    <a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach



        </div><!--features_items-->



        <div class="features_items"><!--recommended-->
            <h2 class="title text-center">Recomendados</h2>

            @foreach($recommends as $recommend)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">


                            @if(count($recommend->images))
                                <img src="{{ url('uploads/'.$recommend->images->first()->id.'.'.$recommend->images->first()->extension) }}" alt="" width="200px" />
                            @else
                                <img src="{{ url('images/no-img.jpg') }}" alt="" width="200px" />
                            @endif


                            <h2>R$ {{ $recommend->price }}</h2>
                            <p>{{ $recommend->name }}</p>
                            <a href="" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>R$ {{ $recommend->price }}</h2>
                                <p>{{ $recommend->name }}</p>
                                <a href="" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                <a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div><!--recommended-->

    </div>

@stop