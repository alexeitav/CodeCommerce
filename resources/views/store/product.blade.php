@extends('store.store')
@section('categories')

    @include('store.partials.category')

@stop

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">

                    @if(count($product->images))
                        <img src="{{ url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension) }}" alt="" width="200px" />
                    @else
                        <img src="{{ url('images/no-img.jpg') }}" alt="" width="200">
                    @endif
                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            @foreach($product->images as $image)
                                <a href=""><img src="{{ url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension) }}" alt="" width="80px" /></a>
                            @endforeach
                        </div>
                    </div>

                </div>


            </div>

            <div class="col-sm-7">

                <div class="product-information">

                    <h2>{{ $product->category->name }} :: {{ $product->name }}</h2>

                    <p>{{ $product->description }}</p>
                        <span>
                            <span>R$ {{ number_format($product->price,2,",",".") }}</span>
                                <a href="" class="btn btn-default cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Adicionar no Carrinho
                                </a>
                        </span>

                    <div>
                        <em>tags do produto</em>:
                        @foreach($product->tags as $tag)
                            <span class="label label-primary"><a style="color:#FFF" href="{{ route('store.products.tag', $tag->id) }}" class="">{{ $tag->name }}</a></span>
                        @endforeach
                    </div>

                </div>

            </div>


        </div>


    </div>

@stop