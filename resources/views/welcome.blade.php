<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="{{ asset('/public/images/back.png') }}">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link rel="stylesheet" href="{{ asset('css/style_front.css') }}" />
    <title>Question form</title>
    <style>
        #address_2, #address_3{
            display: none;
        }
    </style>
</head>

<body>
    <div id="main-container">
        <div class="flex-item">
            <h1 style="text-decoration:underline">Careers</h1>
            <h1>Join Us</h1>
        </div>
        <div class="flex-item logo">
            <video width="150rem" height="240">
                <source src="{{ asset('/public/images/animation.gif.mp4') }}" type="video/mp4">
            </video>
        </div>
        @php
            $questions = App\Models\Question::get();
            $step_count = 1;
        @endphp
        <div class="flex-item">

            <?php
            // $session_id = exec('getmac');
              $session_id = session()->getId();
            //   echo $session_id;
              if(App\Models\FormNumber::where('session_id',$session_id)->count() > 0){
                echo '<h1>You have already filled the form.</h1>';
              }else{
            ?>
              <form id="regForm" method="post" class="gradient-box rainbow" action="{{ route('forms.saveForm') }}"
                  enctype="multipart/form-data">
                  @csrf
                  @if (session('error'))
                      @if (is_array(session('error')))
                          @foreach (session('error') as $error)
                              <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                  style=" background: red; color: white; ">
                                  {{ $error }}
                                  {{-- <button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close">
                              <i class = "ik ik-x"></i>
                          </button> --}}
                              </div>
                          @endforeach
                      @else
                          <div class="alert alert-danger alert-dismissible fade show" role="alert"
                              style=" background: red; color: white; ">
                              {{ session('error') }}
                              {{-- <button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close">
                          <i class = "ik ik-x"></i>
                      </button> --}}
                          </div>
                      @endif

                  @endif
                  <!-- One "tab" for each step in the form: -->
                  @foreach ($questions as $index => $item)
                      <div class="tab">
                          <h1> {{ $item->question }}</h1>
                          @php
                              $step_count = $step_count + 1;
                          @endphp
                          @if ($item->type == 'image')
                              <p style="display:flex;">
                                  <input id="imgInp" class="border-gradient border-gradient-purple"
                                      placeholder="{{ $item->question }}" oninput="this.className = ''"
                                      name="{{ $item->name }}" type="file" hidden required />
                                  <label class="border-gradient border-gradient-purple upload-img" for="imgInp">Choose
                                      Image</label>

                                  <img id="blah" src="{{ asset('/public/images/noimage.jpeg') }}" alt="your image" />

                              </p>
                          @endif


                          @if ($item->type == 'string' && $item->yes_no == 0)

                              @if($item->name == 'address')
                                @for($i=0; $i<3; $i++)
                                @php
                                $placeholder = "Address";
                                if ($i == 0 ) {
                                    $placeholder = "Select Country";
                                }elseif ($i==1) {
                                    $placeholder = "Select State";
                                }else {
                                    $placeholder = "Select City";
                                }
                                // if($i==0){

                                // }
                                $countries = \App\Models\Country::all();
                                @endphp
                                    <p>
                                        <select name="{{ $item->name }}{{$i==0 ? '' : $i }}" id="{{ $item->name }}_{{ $i+1 }}" class="border-gradient border-gradient-purple" oninput="this.className = ''">
                                            <option value="" selected disabled>{{ $placeholder }}</option>
                                            @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </p>
                                @endfor
                              @else
                              <p>
                                <input class="border-gradient border-gradient-purple"
                                    placeholder="{{ $item->question }}" oninput="this.className = ''"
                                    name="{{ $item->name }}" required />
                            </p>
                            @endif
                          @elseif($item->type == 'number')
                              <p>
                                  <input type="tel" class="border-gradient border-gradient-purple"
                                      placeholder="{{ $item->question }}" oninput="this.className = ''"
                                      name="{{ $item->name }}" maxlength="10" required />
                              </p>
                          @elseif($item->type == 'email')
                              <p>
                                  <input type="email" class="border-gradient border-gradient-purple"
                                      placeholder="{{ $item->question }}" oninput="this.className = ''"
                                      name="{{ $item->name }}" required />
                              </p>
                          @endif
                      </div>
                  @endforeach
                  <span id="invalid-pop">please enter correct value !!!</span>
                  <div style="overflow: auto" id="check">

                      <div style="float: right">
                          <button class="border-gradient border-gradient-purple btn" type="button" id="prevBtn"
                              onclick="nextPrev(-1)">
                              Previous
                          </button>
                          <button class="border-gradient border-gradient-purple btn" type="button" id="nextBtn"
                              onclick="nextPrev(1)">
                              Next
                          </button>

                      </div>
                  </div>
                  <!-- Circles which indicates the steps of the form: -->
                  <div style="text-align: center; margin-top: 40px">
                      @for ($i = 1; $i < $step_count; $i++)
                          <span class="step"></span>
                      @endfor
                  </div>
              </form>
            <?php
        }
        ?>
        </div>
        <div>
            <p
                style=" background:linear-gradient(to left, #FF0000 0%, #ffff00 50%, #FF0000 100%); -webkit-background-clip: text;
      -webkit-text-fill-color: transparent; margin-top: 10rem;">
                Copyright Noorgames © 2021 All Rights Reserved</p>
        </div>
    </div>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.4.min.js') }}"></script>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
   <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $("#address_1").change(function(){
            var country_id = $("#address_1").val();
            $("#address_2").css("display", "block");
            $.post('{{ route('country.get_state_by_country') }}',{_token:'{{ csrf_token() }}', country_id:country_id}, function(data){
                $('#address_2').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#address_2').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                    // $('.demo-select2').select2();
                }

            });
        });
        $('#address_2').change(function(){

            var state_id = $('#address_2').val();
            $.post('{{ route('country.get_city_by_state') }}',{_token:'{{ csrf_token() }}', state_id:state_id}, function(data){
                if(data){
                    $("#address_3").css("display", "block");
                    $('#address_3').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#address_3').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                    // $('.demo-select2').select2();
                }
                }


            });
        });
    });
</script>
</body>


</html>
