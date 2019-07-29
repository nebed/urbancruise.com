<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    {!! Html::style('css/select2.min.css') !!}

    <title>Create Post | UrbanCruise</title>
  </head>
  <body>

		    @include('partials._adminnav')

			<div class="container">
			<br>
			<div class="row justify-content-md-center">
				@include('partials._messages')
        <div class="col-md-10 mb-5">
          <h4 class="mb-1">Choose Featured Posts</h4>
          <div class="row">
            <div class="col-md-7">
              <select title="select between 4 and 7 posts" id="select-featured" class="form-control multiple-tags-select2" multiple="multiple" name="featured[]">
            
            @foreach($posts as $post)
            <option value='{{$post->id}}'>{{$post->title}}</option>
            @endforeach

          </select>
            </div>
            <div class="col-md-5">
              <button id="btn-featured" class="btn btn-primary btn-block">Save</button>
            </div>
          </div>
        </div>

				<div class="col-md-10">
					<h1>All Posts</h1>
				</div>
				<div class="col-md-2">
					<a href="{{route('posts.create')}}" class="btn btn-lg btn-block btn-primary">Create Post</a>
				</div>
				<hr>
			</div>


			<div class="row">
				<div class="col-md-12">
					<table id="poststable" class="table table-striped table-bordered">
						<thead>
							<th>#</th>
							<th>Title</th>
							<th>Body</th>
              <th>Views</th>
              <th>Status</th>
							<th>Created At</th>
							<th></th>
						</thead>
						<tbody>
							@foreach($posts as $post)
								<tr>
									<td>{{$post->id}}</td>
									<td>{{$post->title}}</td>
									<td>{!!substr(strip_tags($post->body),0,50)!!}{{ strlen($post->body) > 50 ? "..." : ""}}</td>
                  <td>no of views</td>
                  <td>{{$post->status}}</td>
									<td>{{date('M j, Y', strtotime($post->created_at))}}</td>
									<td><a href="{{route('posts.show', $post->id)}}" class="btn btn-default btn-sm">View</a><a href="{{route('posts.edit', $post->id)}}" class="btn btn-default btn-sm">Edit</a>

                {!! Form::open(['route' => ['posts.publish',$post->id], 'method'=>'post']) !!}
                {!!Form::submit('Publish',array('class' => ' btn btn-success btn-sm'))!!}
                {!! Form::close() !!}
                {!! Form::open(['route' => ['posts.redact',$post->id], 'method'=>'post']) !!}
                {!!Form::submit('Redact',array('class' => ' btn btn-warning btn-sm'))!!}
                {!! Form::close() !!}
								{!! Form::open(['route' => ['posts.destroy',$post->id], 'method'=>'delete']) !!}
								{!!Form::submit('Delete',array('class' => ' btn btn-danger btn-sm'))!!}
                				{!! Form::close() !!}</td>
								</tr>
							@endforeach
						</tbody>
            <tfoot>
            <tr>
                <th>#</th>
              <th>Title</th>
              <th>Body</th>
              <th>Views</th>
              <th>Status</th>
              <th>Created At</th>
              <th></th>
            </tr>
          </tfoot>
					</table>
			</div>
		</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    {!! Html::script('js/select2.min.js') !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#poststable').DataTable();
      } );
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
             url: '/posts/featured',
             data: { featured : featured },
             success: function( data ) {
                 alert('The posts have been saved');
             },
             error: function() {
                alert('there was an error saving the post');
             }
         });
      });
    </script>
  </body>
</html>