@extends('main')

@section('title', 'Register | UrbanCruise')

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
                    Register as An Author
                </h1>
            </div> <!-- end s-content__header -->

            <div class="col-full s-content__main">

                <h3>Register</h3>

                {!! Form::open() !!}
                <div class="form-field">
                    {{Form::label('name','Your Name:')}}
                {{Form::text('name',null,['class'=>'full-width'])}}
                </div>
                <div class="form-field">
                    {{Form::label('email','Your Email:')}}
                {{Form::email('email',null,['class'=>'full-width'])}}
                </div>
                <div class="message form-field">
                    {{Form::label('description','Self Description:')}}
                {{Form::textarea('description',null,['class'=>'full-width'])}}
                </div>
                <div class="form-field">
                    {{Form::label('password','Your Password:')}}
                {{Form::password('password',['class'=>'full-width'])}}
                </div>
                <div class="form-field">
                    {{Form::label('password_confirmation','Confirm Password:')}}
                {{Form::password('password_confirmation',['class'=>'full-width'])}}
                </div>
                {{Form::submit('Register',['class'=>'submit btn btn--primary full-width'])}}

                {!! Form::close() !!}
            </div> <!-- end s-content__main -->

        </div> <!-- end row -->

    </section> <!-- s-content -->

@endsection