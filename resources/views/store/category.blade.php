@extends('store.store')
@section('categories')

    @include('store.partials.category')

@stop

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">{{ $category->name }}</h2>

            @if(count($products))

                @include('store.partials.product', ['products' => $products])

            @else
                <div class="col-sm-12">
                    <p>Não há produtos nessa categoria</p>
                </div>
            @endif


        </div><!--features_items-->


    </div>

@stop