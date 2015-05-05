@extends('app')

@section('content')

    <div class="container">
        <h1>Create Product</h1>

            @if ($errors->any())

                <ul class="alert">
                    @foreach($errors->all() as $error)
                    <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::open(['route'=>'product.store']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('price', 'Price:') !!}
                    {!! Form::text('price', null, ['class'=>'form-control']) !!}
                </div>

                <div class=""form-group">
                    {!! Form::label('featured', 'Featured:') !!}
                    {!! Form::hidden('featured', 0) !!}
                    {!! Form::checkbox('featured') !!}
                </div>

                <div class=""form-group">
                    {!! Form::label('recommend', 'Recommend:') !!}
                    {!! Form::hidden('recommend', 0) !!}
                    {!! Form::checkbox('recommend') !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Add Product', ['class'=>'btn btn-primary']) !!}
                    <a class="btn btn-default" href="{{ route('product.index') }}">Voltar</a>
                </div>




            {!! Form::close() !!}

    </div>

@endsection