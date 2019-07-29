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

                <h3>Enter Email</h3>

                {!! Form::open(['url'=>'password/reset','method'=>"POST"]) !!}
                {{Form::hidden('token',$token)}}
                <div class="form-field">
                    {{Form::label('email','Your Email:')}}
                {{Form::email('email',$email,['class'=>'full-width'])}}
                </div>
                <div class="form-field">
                    {{Form::label('password','New Password:')}}
                {{Form::password('password',['class'=>'full-width'])}}
                </div>
                <div class="form-field">
                    {{Form::label('password_confirmation','Confirm New Password:')}}
                {{Form::password('password_confirmation',['class'=>'full-width'])}}
                </div>
                {{Form::submit('Reset Password',['class'=>'submit btn btn--primary full-width'])}}

                {{ Form::close() }}
            </div> <!-- end s-content__main -->

        </div> <!-- end row -->

    </section> <!-- s-content -->

@endsection