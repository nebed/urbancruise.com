@extends('main')

@section('title', 'Forgot my Password | BettyKings Daily')

@section('content')

<body id="top">

    <!-- pageheader
    ================================================== -->
    <div class="s-pageheader">

         @include('partials._nav')

    </div> <!-- end s-pageheader -->


    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow">

        <div class="row">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                    Reset Password
                </h1>
            </div> <!-- end s-content__header -->

            <div class="col-full s-content__main">
                @if (session('status'))

                <div class="alert-box alert-box--success hideit">
                    <p>{{ session('status')}}</p>
                    <i class="fa fa-times alert-box__close"></i>
                </div>

                @endif

                <h3>Enter Email</h3>

                {!! Form::open(['url'=>'password/email','method'=>"POST"]) !!}
                <div class="form-field">
                    {{Form::label('email','Your Email:')}}
                {{Form::email('email',null,['class'=>'full-width'])}}
                </div>
                {{Form::submit('Reset Password',['class'=>'submit btn btn--primary full-width'])}}

                {{ Form::close() }}
            </div> <!-- end s-content__main -->

        </div> <!-- end row -->

    </section> <!-- s-content -->

@endsection