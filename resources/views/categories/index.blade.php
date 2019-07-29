<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    {!! Html::style('css/select2.min.css') !!}

    <title>All Categories | BettyKings Daily</title>
  </head>
  <body>

@include('partials._adminnav')

		<div class="container">
			<br>
			<div class="row justify-content-md-center">
          @include('partials._messages')
        <div class="col-md-10 mb-5">
          <h4 class="mb-1">Choose Featured Categories</h4>
          <div class="row">
            <div class="col-md-7">
              <select title="select 2 categories" id="select-featured" class="form-control multiple-tags-select2" multiple="multiple" name="featured[]">
                  @foreach($categories as $category)
                  <option value='{{$category->id}}'>{{$category->title}}</option>
                  @endforeach
              </select>
            </div>
            <div class="col-md-5">
              <button id="btn-featured" class="btn btn-primary btn-block">Save</button>
            </div>
          </div>
        </div>
				<div class="col-md-9">
					<h1>Categories</h1>
					<hr>
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              @foreach ($categories as $category)
              <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{!! Form::open(['route' => ['categories.destroy',$category->id], 'method'=>'delete']) !!}
                {!!Form::submit('Delete',array('class' => ' btn btn-danger btn-sm'))!!}
                {!! Form::close() !!}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
				</div>
        <div class="col-md-3">
          <div class="well">
            {!! Form::open(['route'=>'categories.store','method'=>'POST']) !!}
            <h2>New Category</h2>
            {{  Form::label('name','Name:') }}
            {{ Form::text('name',null,['class'=>'form-control']) }}
            {{ Form::submit('Create New Category',['class'=>'btn btn-primary btn-block btn-h1-spacing']) }}
            {!! Form::close() !!}
          </div>
        </div>
			</div>
		</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    {!! Html::script('js/select2.min.js') !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $('.multiple-tags-select2').select2({
        maximumSelectionLength: 7
        });

      $('#btn-featured').on('click', function(){
        var featured = $("#select-featured").val();
        $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         $.ajax({
             type: "POST",
             url: '/categories/featured',
             data: { featured : featured },
             success: function( data ) {
                 alert('The categories have been saved');
             },
             error: function() {
                alert('there was an error saving the categories');
             }
         });
      });
    </script>
  </body>
</html>