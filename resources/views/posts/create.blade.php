<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    {!! Html::style('css/select2.min.css') !!}
    {!! Html::script('js/tinymce/tinymce.min.js')!!}
  <script>
    var editor_config = {
        path_absolute : "{{ URL::to('/') }}/",
        selector: "textarea",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }
            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    }; 
  tinymce.init(editor_config);</script>
    <title>Create Post | UrbanCruise</title>
  </head>
  <body>

	@include('partials._adminnav')  

		<div class="container">
			<br>
			<div class="row justify-content-md-center">
				<div class="col-md-8 col-md-offset-2">
					@include('partials._messages')
					<h1>Create New Post</h1>
					<hr>

					{!! Form::open(['route' => 'posts.store', 'files'=>true]) !!}
					{{Form::label('title','Title:')}}
					{{Form::text('title',null,array('class'=>'form-control','required' => 'yes'))}}
					{{Form::label('slug','URL:')}}
					{{Form::text('slug',null,array('class'=>'form-control','required' => 'yes','min-length'=>'5', 'max-length'=>'70'))}}
          {{ Form::label('category_id','Category:') }}
          <select class="form-control" name="category_id">
            
            @foreach($categories as $category)
            <option value='{{$category->id}}'>{{$category->name}}</option>
            @endforeach

          </select>

          {{ Form::label('featured_image','Upload Featured Image:') }}
          {{ Form::file('featured_image') }}

          {{ Form::label('tags','Tags:') }}
          <select class="form-control multiple-tags-select2" multiple="multiple" name="tags[]">
            
            @foreach($tags as $tag)
            <option value='{{$tag->id}}'>{{$tag->name}}</option>
            @endforeach

          </select>
					{{Form::label('body','Post Body:')}}
					{{Form::textarea('body',null,array('class'=>'form-control'))}}
					{{Form::submit('Create Post',array('class'=>'btn btn-info btn-lg btn-block','style'=>'margin-top:20px;'))}}
					{!! Form::close() !!}
					
				</div>
			</div>
		</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    {!! Html::script('js/select2.min.js') !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript"> 
      $('.multiple-tags-select2').select2();
    </script>
  </body>
</html>