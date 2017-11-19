@include('flash::message')

@if(count($errors))
{{-- {{dd($errors)}} --}}
<div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  <strong>Oops!</strong> there are something wrong!
  <ul>
    @foreach($errors->all() as $error)
      <li><strong> {{ $error }} </strong></li>
    @endforeach
  </ul>
</div>
@endif

@if($message = Session::get('success'))
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
    <strong>{{ $message }}</strong>
  </div>
@endif