
  @php

  $details = json_decode($colab->details,true);
  $city_id = json_decode($colab->address, true);
  if(!empty($city_id[0]['city'])){
    $city = App\Models\City::where('id',$city_id[0]['city'])->first();
//     echo '<pre>';
//   print_r($city->get_state->getCountry);
//   echo '</pre>';
  }
  @endphp
  <div class="row">
    @foreach ($details as $key => $item)
        <div class="col-md-12 form-group">
            @if($item['name'] != "address")
          <label for="">{{$item['question']}}</label>
          @endif
          @if ($item['type'] != 'image')
            @if ($item['answer'] == 'yes')
            <br>
            <span class="badge badge-success">{{ucwords($item['answer'])}}</span>
            @elseif($item['answer'] == 'no')
              <br>
              <span class="badge badge-danger">{{ucwords($item['answer'])}}</span>
            @else
            @if($item['name'] != "address")
              <p>

                {{ucwords($item['answer'])}}
              </p>
              @else
              <label for="">{{$item['question']}}</label><br>

              @if(!empty($colab->address))
              <p>
                {{ $city->get_state->getCountry->name }},  {{ $city->get_state->name }},  {{ $city->name }}
              </p>
              @else
              {{ucwords($item['answer'])}}
              @endif

              @endif
            @endif
          @else
          <br>
          <a href="{{asset('/images/form-images/'.$item['image'])}}" target="_blank">
            <img src="{{asset('/images/form-images/'.$item['image'])}}" style="width:300px;height: 300px;object-fit: cover;" alt="">

          </a>
          @endif
        </div>
    @endforeach
  </div>
