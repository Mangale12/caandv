<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="{{ URL::to('/images/g9.webp') }}">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link rel="stylesheet" href="{{ asset('css/style_front.css') }}" />
    <title>Question form</title>
  </head>
  <body>
    <div id="main-container">
        <div class="flex-item">
            <h1 style="text-decoration:underline" >Careers</h1>
            <h1>Join Us</h1>
        </div>
        <div class="flex-item logo">
            <video width="150rem" height="240" >
            <source src="{{ URL::to('/images/animation.gif.mp4') }}" type="video/mp4">
          </video>
        </div>
        @php
            $questions = App\Models\Question::get();
            // dd($questions);
            // echo '<pre>';
            //     print_r($questions);
            //     die;
            $step_count = 1;
        @endphp
      <div class="flex-item">
        <form id="regForm" method="post" class="gradient-box rainbow" action="{{ route('forms.saveForm') }}" enctype="multipart/form-data">
        @csrf
        @if (session('error'))
            @if(is_array(session('error')))
                @foreach(session('error') as $error)
                    <div class = "alert alert-danger alert-dismissible fade show" role = "alert" style=" background: red; color: white; ">
                        {{ $error }}
                        <button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close">
                            <i class = "ik ik-x"></i>
                        </button>
                    </div>
                @endforeach
            @else
                <div class = "alert alert-danger alert-dismissible fade show" role = "alert" style=" background: red; color: white; ">
                    {{ session('error') }}
                    <button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close">
                        <i class = "ik ik-x"></i>
                    </button>
                </div>
            @endif

        @endif
          <!-- One "tab" for each step in the form: -->
        @foreach ($questions as $index => $item)
        <div class="tab">
            <h1> {{$item->question}}</h1>
            @php
                $step_count = $step_count+1;
            @endphp
            @if ($item->type == 'image')
                <p style="display:flex;">
                    <input
                    id="imgInp"
                    class="border-gradient border-gradient-purple"
                    placeholder="{{$item->question}}"
                    oninput="this.className = ''"
                    name="{{$item->name}}"
                    type="file"
                    hidden
                    required
                    />
                    <label class="border-gradient border-gradient-purple upload-img" for="imgInp">Choose Image</label>

                    <img id="blah" src="{{ URL::to('/images/noimage.jpeg') }}" alt="your image" />

                </p>
            @endif

            @if ($item->type == 'string' && $item->yes_no == 0)
                <p>
                    <input
                    class="border-gradient border-gradient-purple"
                        placeholder="{{$item->question}}"
                        oninput="this.className = ''"
                        name="{{$item->name}}"
                        required
                    />
                </p>
            @elseif($item->type == 'number')
            <p>
                <input
                class="border-gradient border-gradient-purple"
                    placeholder="{{$item->question}}"
                    oninput="this.className = ''"
                    name="{{$item->name}}"
                    required
                />
            </p>
            @elseif($item->type == 'email')
            <p>
                <input
                class="border-gradient border-gradient-purple"
                    placeholder="{{$item->question}}"
                    oninput="this.className = ''"
                    name="{{$item->name}}"
                    required
                />
            </p>
            @endif
        </div>
        @endforeach
          <span id="invalid-pop">please enter correct value !!!</span>
          <div style="overflow: auto">

            <div style="float: right">
              <button class="border-gradient border-gradient-purple btn" type="button" id="prevBtn" onclick="nextPrev(-1)">
                Previous
              </button>
              <button class="border-gradient border-gradient-purple btn" type="button" id="nextBtn" onclick="nextPrev(1)">
                Next
              </button>

            </div>
          </div>
          <!-- Circles which indicates the steps of the form: -->
          <div style="text-align: center; margin-top: 40px">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
          </div>
        </form>
    </div>
    <div>
      <p style=" background:linear-gradient(to left, #FF0000 0%, #ffff00 50%, #FF0000 100%); -webkit-background-clip: text;
      -webkit-text-fill-color: transparent; margin-top: 10rem;">Copyright Noorgames © 2021 All Rights Reserved</p>
    </div>
    </div>
  </body>
  <script src="{{ asset('js/main.js') }}"></script>
</html>
