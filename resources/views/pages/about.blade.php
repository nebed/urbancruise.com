@extends('main')

@section('title', 'About UrbanCruise')

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
                    Learn More About Me.
                </h1>
            </div> <!-- end s-content__header -->

            <div class="s-content__media col-full">
                <div class="s-content__post-thumb">
                    <img src="{{ asset('images/about.jpeg') }}" 
                         sizes="(max-width: 2000px) 100vw, 2000px" alt="" >
                </div>
            </div> <!-- end s-content__media -->

            <div class="col-full s-content__main">

                <p class="lead">UrbanCruise, 
                I know why you’re here...
                You’ve had your shiny 6-inch red bottoms sitting in your closet for months and don’t know what to do with it.  Your favourite sexy black dress isn’t turning heads because you have been seen in it more than once and as of now, it’s just another black dress on a hanger. I am very excited to tell you that you and I can change all that. </p>
                
                <p>Hello to the gorgeous pair of eyes reading this, I’m glad you stopped by. I’ll have you looking like a million bucks in no time. I am Bethel Ihuoma, Obieze and I have the easiest solutions to your fashion dilemmas. 
                </p>

                <p>“In order to be irreplaceable one must always be different,” says Coco Chanel. For the longest time, I have been in love with fashion. I've always had an effortless approach to throwing clothing pieces together and coming up with looks that not only wow the people I meet but also make our meeting memorable.

                This is why I have created a fashion blog. I will share my tips and tricks with you on how to develop a jaw-dropping style to suit your character and most importantly your budget. 
                </p>

                <div class="row block-1-2 block-tab-full">
                    <div class="col-block">
                        <h3 class="quarter-top-margin">Who Am I.</h3>
                        <p>For the longest time, I have been in love with fashion. I've always had an effortless approach to throwing clothing pieces together and coming up with looks that not only wow the people I meet but also make our meeting memorable.
                        This is why I have created a fashion blog. I will share my tips and tricks with you on how to develop a jaw-dropping style to suit your character and most importantly your budget. </p>
                    </div>

                    <div class="col-block">
                        <h3 class="quarter-top-margin">We've got you covered.</h3>
                        <p>Did I hear you ask “what should I expect to see on this blog?” I've got you covered. You should expect variety, creativity, style, elegance, and class. It’s a guarantee so expect nothing less! We’ll have lots of fun together as I recreate looks using old and new fashion pieces and trends. We’ll also explore the fashion lifestyle of shopping, photo shoots, and also criticise other fashion looks. Now that we’re all caught up I ask that you dust off your favourite pair of shoes and slip into your Sunday’s best. We're about to hit the town and turn fashion upside down!</p>
                    </div>


                </div>


            </div> <!-- end s-content__main -->

        </div> <!-- end row -->

    </section> <!-- s-content -->


@endsection