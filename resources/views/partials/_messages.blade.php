@if (Session::has('success'))  

	<div class="alert-box alert-box--success hideit">
                    <p><strong>Success:</strong> {{ Session::get('success') }}</p>
                    <i class="fa fa-times alert-box__close"></i>
                </div>

@endif

@if (count($errors)>0)
 <div class="alert-box alert-box--error hideit">
		<p><strong>Errors:</strong>
		<ul> 
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
		</ul>
		</p>
	<i class="fa fa-times alert-box__close"></i>
        </div>
@endif