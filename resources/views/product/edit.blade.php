@extends('app')

@section('content')

    <div class="container">
        <h1>Editing Product: {{ $product->name  }}</h1>

            @if ($errors->any())

                <ul class="alert">
                    @foreach($errors->all() as $error)
                    <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::open(['route'=>['product.update', $product->id], 'method'=>'put']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', $product->name, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('category', 'Category:') !!}
                    {!! Form::select('category_id', $categories, $product->category->id, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::textarea('description', $product->description, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('price', 'Price:') !!}
                    {!! Form::text('price', $product->price, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('tags', 'Tags:') !!}
                    {!! Form::textarea('tags', $product->tag_list, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('featured', 'Featured:') !!}
                    {!! Form::hidden('featured', 0) !!}
                    {!! Form::checkbox('featured', 1, $product->featured) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('recommend', 'Recommend:') !!}
                    {!! Form::hidden('recommend', 0) !!}
                    {!! Form::checkbox('recommend', 1, $product->recommend) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Save Product', ['class'=>'btn btn-primary']) !!}
                    <a class="btn btn-default" href="{{ route('product.index') }}">Voltar</a>
                </div>




            {!! Form::close() !!}

    </div>

@endsection