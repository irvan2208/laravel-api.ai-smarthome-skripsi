@extends('layouts.vendor-setting')
@push('custom_css')
  <style>
    textarea {
      resize: none;
    }
  </style>
@endpush
@section('vendorSetting')
@if ($vendor)
<section id="lqt-content">
	<h1 class="lqt-mt0">My Place</h1>
	<br>
	{{ Form::open(['url' => route('vendor.update.myplace', ['vendor' => $vendor]), 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true]) }}
	    <div class="form-group">
	        <label class="control-label col-sm-3">Title of Your Place</label>
	        <div class="col-sm-7">
	            <input type="text" class="form-control" name="name" placeholder="" value="{{$vendor->name}}">
	        </div>
	    </div>
      <div class="form-group">
          <label class="control-label col-sm-3">Your Place Introduction</label>
          <div class="col-sm-7">
              <textarea class="form-control" rows="5" name="description">{{ $vendor->description }}</textarea>
          </div>
      </div>
	    <div class="form-group">
	        <label class="control-label col-sm-3">Point Your Map</label>
	        <div class="col-sm-7">
            <div id="current" style="display: none">Nothing yet...</div>
            {{ Form::hidden('longitude', $vendor->longitude, ['id'=>'longitude']) }}
            {{ Form::hidden('latitude', $vendor->latitude, ['id'=>'latitude']) }}
            <div id="map" style="height: 300px;"></div>
            </div>
	    </div>
	    <div class="form-group">
	        <label class="control-label col-sm-3">Upload Photos of Your Place</label>
	        <div class="col-sm-7">
	            <input type="file" id="fileInput" class="form-control" multiple name="place_pic[]" placeholder="">
              <div id="media-box"></div>
	        </div>
	    </div>
	    <div class="form-group">
	        <label class="control-label col-sm-3">Choose Gallery Style</label>
	        <div class="col-sm-7">
	            {{ Form::select('gallery_style', ['1' => 'Metric', '2' => 'Material'], $vendor->gallery_style, ['placeholder' => 'Pick a Style...', 'class'=>'form-control']) }}
	        </div>
	    </div>
	    <div class="form-group">
	        <div class="col-sm-12">
	            <button type="submit" class="btn btn-default lqt-btn-form">Save</button>
	        </div>
	    </div>
	{{ Form::close() }}
</section>
@else
  <h2 class="text-center"> Your vendor has been deleted by admin, please contact administrator for further information</h2>
@endif
@endsection

@push('additional-script')
<script>
  function initMap() {
    @if($vendor && ($vendor->latitude!='' && $vendor->longitude!=''))
        var posL = {lat: {{$vendor->latitude}}, lng: {{$vendor->longitude}}};
    @else
        var posL = {lat: 1.1272642, lng: 104.01432};
    @endif
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: posL
    });
    var marker = new google.maps.Marker({
      position: posL,
      map: map,
      draggable:true,
        animation: google.maps.Animation.DROP,
    });
    google.maps.event.addListener(marker, 'dragend', function(evt){
        $('#latitude').val(evt.latLng.lat().toFixed(3));
        $('#longitude').val(evt.latLng.lng().toFixed(3));
    document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
    });

    google.maps.event.addListener(marker, 'dragstart', function(evt){
        document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
    });

    map.setCenter(marker.position);
    marker.setMap(map);
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GMAP_KEY')}}&callback=initMap"></script>
<script type="text/javascript">
      $('#fileInput').change(function () {
      var files = this.files;

      $.each(files, function (index, file) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var image = `<div class="col-md-4"><img class="img-responsive" style="max-width: 100px;" src="`+e.target.result+`"></img></div>`;
            $('#media-box').append(image);
        }

        reader.readAsDataURL(file);
      })
    })
</script>
@endpush