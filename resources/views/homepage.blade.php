@extends('layouts.app')
@push('pushStyle')
<link rel="stylesheet" type="text/css" href="{{url('/')}}/plugins/bower_components/datatables/jquery.dataTables.min.css" />
<style type="text/css">
  .map{
    text-align:center;
    padding-top:5%;
}

.map svg {
    height: auto;
    width: 100%;
    margin: 0 auto;
    display: block;
}
.map g {
    fill: #ccc;
    stroke: #333;
    stroke-width: 0;
}
.map g:hover {
    fill: #fc0 !important;
}
.info_panel {
    background-color: rgba(255,255,255, .8);
    padding: 5px;
    font-size: 12px;
    font-family: Helvetica, Arial, sans-serif;
    position: absolute;
    border: 1px solid #333;
    color: #333;
    white-space: nowrap;
}
.info_panel::first-line {
    font-weight: bold;
}
@media only screen and (max-width: 320px) {
    .map svg {
        width: 100%;
    }
    .map{
        padding-top:15%;
    }
}
body {
  background: url("{{url('/')}}/img/bg_ares.jpg");
}
</style>
@endpush
@section('content')
<main id="page-main">
                <!-- Columns -->
                <div class="row">
                    <!-- Animated Circles Column -->
                    <div class="col-lg-6 col-lg-push-3 overflow-hidden push-20">
                        <div class="map">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="451.5px" height="401.9px" viewBox="0 0 451.5 401.9" style="enable-background:new 0 0 451.5 401.9;" xml:space="preserve">
                                <style type="text/css">
                                <![CDATA[
                                    .st0{fill:#FFFFFF;fill-opacity:0.0}
                                    .st1{font-size:14.103;}
                                    .st2{fill:none;stroke:#D2D2D2;stroke-width:14;stroke-opacity: 0.7;}
                                    .st3{font-family:'ArialMT';}
                                    .st4{font-size:13;}
                                ]]>
                                </style>
                                <g id="Border">
                                    <polyline class="st2" points="294.4,397.9 294.4,370.6 294.4,391.9   "/>
                                    <polyline class="st2" points="278.1,391.9 294.4,391.9 442.7,391.9 442.7,259.9 294.4,259.9   "/>
                                    <line class="st2" x1="11.4" y1="267.9" x2="227.4" y2="267.9"/>
                                    <line class="st2" x1="11.4" y1="133.2" x2="227.4" y2="133.2"/>
                                    <polyline class="st2" points="294.4,348.6 294.4,9.9 11.4,9.9 11.4,391.9 227.4,391.9     "/>
                                </g>
                                <g id="1">
                                    <rect x="18.7" y="275.2" class="st0" width="269.3" height="110"/>
                                    <text transform="matrix(1 0 0 1 132.3979 333.897)" class="st3 st4">Room 1</text>
                                </g>
                                <g id="2">
                                    <rect x="18.7" y="140.6" class="st0" width="269.3" height="119.3"/>
                                    <text id="Room_2_1_" transform="matrix(0.9218 0 0 1 132.3979 204.2075)" class="st3 st1">Room 2</text>
                                </g>
                                <g id="3">
                                    <rect x="18.7" y="16.9" class="st0" width="269.3" height="110"/>
                                    <text transform="matrix(1 0 0 1 132.3979 75.5635)" class="st3 st4">Room 1</text>
                                </g>
                                <g id="4">
                                    <rect x="301.4" y="266.6" class="st0" width="134" height="117.7"/>
                                    <text transform="matrix(1 0 0 1 348.064 333.2329)" class="st3 st4">Room 4</text>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <!-- END Animated Circles Column -->

                    <!-- Left Column -->
                    <div class="col-sm-6 col-lg-3 col-lg-pull-6">
                        <!-- Planets -->
                        <div class="block">
                            <div class="block-header overflow-hidden">
                                <h2 class="block-title visibility-hidden" data-toggle="appear" data-class="animated fadeInDown">Weather</h2>
                            </div>
                            <div class="block-content">
                                <div class="row items-push overflow-hidden">
                                    <div class="col-xs-4 text-center visibility-hidden" data-toggle="appear" data-class="animated fadeInLeft" data-timeout="100">
                                        <canvas id="weathericon" width="75" height="75"></canvas>
                                    </div>
                                    <div class="col-xs-8 visibility-hidden" data-toggle="appear" data-class="animated fadeInRight" data-timeout="400">
                                        <div class="text-uppercase font-w600 text-white-op">Home Weather</div>
                                        <div class="font-s36 font-w300">{{$weather['currently']['summary']}} <span class="font-s16 font-w400 text-crystal">{{$weather['currently']['temperature']}} &#8451;</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Planets -->
                        <!-- Environment -->
                        <div class="block">
                            <div class="block-header overflow-hidden">
                                <h2 class="block-title visibility-hidden" data-toggle="appear" data-class="animated fadeInDown">Air Conditioner</h2>
                            </div>
                            <div class="block-content">
                                <div class="row items-push overflow-hidden">
                                    <div class="col-xs-4 text-center visibility-hidden" data-toggle="appear" data-class="animated fadeInLeft" data-timeout="300">
                                        <div class="js-pie-chart pie-chart" data-percent="60" data-line-width="5" data-size="65" data-bar-color="rgba(255, 255, 255, .2)" data-track-color="rgba(255, 255, 255, .1)">
                                            <span class="font-s16 font-w600">C&deg;</span>
                                        </div>
                                    </div>
                                    <div class="col-xs-8 visibility-hidden" data-toggle="appear" data-class="animated fadeInRight" data-timeout="600">
                                        <div class="text-uppercase font-w600 text-white-op">Temperature</div>
                                        <div class="font-s36 font-w300">5.3 &#8451;</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Environment -->
                    </div>
                    <!-- END Left Column -->

                    <!-- Right Column -->
                    <div class="col-sm-6 col-lg-3">

                        <!-- POS_TRACKING -->
                        <div class="block">
                            <div class="block-header overflow-hidden">
                                <h2 class="block-title visibility-hidden" data-toggle="appear" data-class="animated fadeInDown">Speech History</h2>
                            </div>
                            <div class="block-content block-content-full overflow-hidden">
                                <textarea disabled id="response" cols="40" rows="20"></textarea> 
                            </div>
                        </div>
                        <!-- END POS_TRACKING -->
                    </div>
                    <!-- END Right Column -->
                </div>
                <!-- END Columns -->
                <div class="navbar navbar-fixed-bottom mic-place"> 
                  <div class="container"> 
                    <div class="col-md-12"> 
                      <div class="input-group input-section "> 
                         <input type="text" id="input" class="form-control"> 
                         <span class="input-group-btn mic-button"> 
                              <button class="btn btn-default" id="rec" type="button"><i class="fa fa-3x fa-microphone mic"></i></button> 
                         </span> 
                      </div> 
                    </div> 
                  </div> 
                </div>
            </main>
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
  <script>
            jQuery(function(){
                // Init page helpers (Appear + CountTo + Easy Pie Chart plugins)
                Ares.initHelpers(['appear', 'appear-countTo', 'easy-pie-chart']);
            });
        </script>
        <script>
            var rooms=[
                {
                    "room_name": "Room 1",
                    "room_code": "1",
                    "area": "576"
                },
                {
                    "room_name": "Room 2",
                    "room_code": "2",
                    "area": "600"
                },
                {
                    "room_name": "Room 3",
                    "room_code": "3",
                    "area": "540"
                },
                {
                    "room_name": "Room 4",
                    "room_code": "4",
                    "area": "288"
                }
            ];
            var temp_array= rooms.map(function(item){
                return item.area;
            });
            var highest_value = Math.max.apply(Math, temp_array);
            
            
            $(function() {
            $(".map g").click(function(){     
                for(i = 0; i < rooms.length; i++) {
                    if ( $(this)[i].hasClass("on") ) {
                        $(this).children().first().css("fill-opacity", "0.0");
                    } else {
                        $(this).children().first().css("fill", "yellow");
                        $(this).children().first().css("fill-opacity", "0.6");
                    }
                    $(this)[i].toggleClass("on");
                }
            });
            
            for(i = 0; i < rooms.length; i++) {
                /*
                $('#'+ rooms[i].room_code)
                .css({'fill': 'rgba(11, 104, 170,' + rooms[i].area/highest_value +')'})
                .data('room', rooms[i]);
                */
                $('#'+ rooms[i].room_code).data('room', rooms[i]);
            }
            
            $('.map g').mouseover(function (e) {
                var room_data=$(this).data('room');
                $('<div class="info_panel">'+
                    room_data.room_name+ '<br>' +
                    'Square: ' + room_data.area.toLocaleString("en-UK") + ' ft<sup>2</sup>' +
                    '</div>'
                 )
                .appendTo('body');
            })
            .mouseleave(function () {
                $('.info_panel').remove();
            })
            .mousemove(function(e) {
                var mouseX = e.pageX, //X coordinates of mouse
                    mouseY = e.pageY; //Y coordinates of mouse

                $('.info_panel').css({
                    top: mouseY-50,
                    left: mouseX - ($('.info_panel').width()/2)
                });
            });
            });
            </script>
            <script src="{{url('/')}}/js/skycons.js"></script>
            {{-- <script>
              var skycons = new Skycons({"color": "#ebebeb"}),
                  list  = [
                    "clear-day", "clear-night", "partly-cloudy-day",
                    "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                    "fog"
                  ],
                  i;
             
                for(i = list.length; i--; ) {
                    var weatherType = list[i],
                        elements = document.getElementsByClassName( weatherType );
                    for (e = elements.length; e--;){
                        skycons.set( elements[e], weatherType );
                    }
                }
             
              skycons.play();
            </script> --}}
            <script type="text/javascript">
                var skycons = new Skycons({'color':'#fff'});
                skycons.add("weathericon", "{{$weather['currently']['icon']}}");
                skycons.play();
            </script>
@endpush