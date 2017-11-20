@extends('layouts.app')
@push('pushStyle')
<link rel="stylesheet" type="text/css" href="{{url('/')}}/plugins/bower_components/datatables/jquery.dataTables.min.css" />
@endpush
@section('content')
<div class="container" style="height: 90%;">
	<div class="col-md-12">
	    <table id="room-table" class="table table-striped">
			<thead>
				<tr>
					<th>Room</th>
  				<th>Status</th>
				</tr>
			</thead>
		</table>
    <textarea id="response" cols="40" rows="20"></textarea>
	</div>
</div>
<div class="navbar navbar-fixed-bottom mic-place">
	<div class="container">
		<div class="col-md-12">
      <div class="input-group input-section">
         <input type="text" id="input" class="form-control">
         <span class="input-group-btn mic-button">
              <button class="btn btn-default" id="rec" type="button"><i class="fa fa-3x fa-microphone mic"></i></button>
         </span>
      </div>
    </div>
	</div>
</div>
@endsection

@push('pushScript')
  <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
  <script type="text/javascript">
    var accessToken = "a3d7bfa4b7a54289a1c4622aeab6daca";
    var baseUrl = "https://api.api.ai/v1/";
    var conversation = [];
    $(document).ready(function() {
      $("#input").keypress(function(event) {
        if (event.which == 13) {
          event.preventDefault();
          send();
        }
      });
      $("#rec").click(function(event) {
        switchRecognition();
      });
    });
    var recognition;
    function startRecognition() {
      $("#input").val('Listening...');
      recognition = new webkitSpeechRecognition();
      recognition.onstart = function(event) {
        updateRec();
      };
      recognition.onresult = function(event) {
        var text = "";
          for (var i = event.resultIndex; i < event.results.length; ++i) {
            text += event.results[i][0].transcript;
          }
          setInput(text);
        stopRecognition();
      };
      recognition.onend = function() {
        stopRecognition();
      };
      recognition.lang = "en-US";
      recognition.start();
    }
  
    function stopRecognition() {
      if (recognition) {
        recognition.stop();
        recognition = null;
      }
      updateRec();
    }
    function switchRecognition() {
      if (recognition) {
        stopRecognition();
      } else {
        startRecognition();
      }
    }
    function setInput(text) {
      $("#input").val(text);
      send();
    }
    function updateRec() {
      $("#rec").html(recognition ? '<i class="fa fa-spinner fa-spin fa-3x"></i>' : '<i class="fa fa-3x fa-microphone mic"></i>');
    }
    function send() {
      var text = $("#input").val();
      conversation.unshift("Me: " + text + '\r\n');
      $("#response").text(conversation.join(""));
      $.ajax({
        type: "POST",
        url: baseUrl + "query?v=20150910",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        headers: {
          "Authorization": "Bearer " + accessToken
        },
        data: JSON.stringify({ query: text, lang: "en", sessionId: "somerandomthing" }),
        success: function(data) {
          // console.log(data);
          setResponse(data);
        },
        error: function() {
          setResponse("Internal Server Error");
        }
      });
      // setResponse("Loading...");
    }
    function setResponse(val) {
      var respText = val.result.fulfillment.speech;
      conversation.unshift("SmartHome: " + respText + '\r\n');
      responsiveVoice.speak(respText);
      $("#response").text(conversation.join(""));
    }
  </script>
<script src="{{url('/')}}/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {

      var dataTable = $('#room-table').DataTable({
        dom: 'lrtip',
        orderCellsTop: true,
        responsive: true,
        bLengthChange: false,
        processing: true,
        serverSide: true,
        ajax: {
            url:  '{{ route('homes.list') }}',
            data: function(data) {
                data._token = '{{ csrf_token() }}'
            },
            type: 'POST',
        },
        columns: [
            { data: 'name' , name: 'name'},
            { data: 'address', name: 'address'},
        ],
      });

      $('#search').on('keyup', function() {
          var value = $(this).val();
          dataTable.search( value ).draw();
      });
    });
  </script>
@endpush