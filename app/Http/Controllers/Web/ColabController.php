<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\FormNumber;
use App\Models\Question;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ColabController extends Controller
{
    public function store(Request $request){
        //dd($request->all());
        // $validator = Validator::make($request->all(), [
        //     'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:formnumbers,phone_number',
        //     'name' => 'required'
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withInput()->with('error', $validator->messages()->first());
        // }
        $data = [];
        $questions = Question::get();
        $post_data = $request->all();
        // dd($post_data);
        // $name  = $request->name;
        // $phone  = $request->phone_number;
        foreach($questions as $question){
            if(key_exists($question->name,$post_data)){
                if($question->type == 'number'){
                    if(!is_numeric($post_data[$question->name])){
                        return redirect()->back()->withInput()->with('error',$question->question.' must be a number.');
                    }
                }
                $answer = $post_data[$question->name];
                // dd($answer);
                if($question->type == 'number'){
                    $answer = '+977'.$answer;
                }

                $image  = '';
                if($question->type == 'image'){
                    $uploadFile = uploadFile($request->file($question->name),'form-images'); //uploadFile from helper.php
                    $image = $uploadFile;
                    $answer = '';
                }

                $data[] = [
                    'question' => $question->question,
                    'name' => $question->name,
                    'type' => $question->type,
                    'image' => $image,
                    'answer' => $answer
                ];
            }
            // else{
            //     echo 'asdf';
            // }
        }
            $address[] = [
                'country'=>$request->address,
                'state'=>$request->address1,
                'city'=>$request->address2,
            ];
        $json = array(
            'details' => json_encode($data),
            'address' => json_encode($address),
            'seen'=>'0',
        );
        $sql = FormNumber::create($json);
        if(!$sql){
            dd('error');
            return redirect()->back()->withInput()->with('error', $sql);
        }

        // $sendtexttouser ='Welcome'.' ' . $request->name . ' ' .', to Noor Games family.We have received your details. Someone from collab team will reach back to you based on your eligibility.
        //    Note: Do not  bother asking to Sasha when will they reach out.';
        // $str = $request->phone_number;
        // $usernumber = preg_replace('/[^0-9]/','',$str);
        // $usernumberint = (int) filter_var($usernumber, FILTER_SANITIZE_NUMBER_INT);

        //  dd($usernumberint);
        // $settings = GeneralSetting::first();
        // $key = (string) $settings['api_key'];
        // $secret = (string) $settings['api_secret'];
        // $basic  = new \Vonage\Client\Credentials\Basic($key, $secret);
        // $client = new \Vonage\Client($basic);
        // $message = $client->message()->send([
        // 'to' => '1'.$usernumber,
        // 'from' => '18337222376',
        // 'text' => $sendtexttouser
        // ]);


        //   $sendtexttoadmin =' Collab team      '.' '  . $request->name . ' is added to the family with ' . 'Phone ' . $request->phone_number . ' ' . 'Take your time to reach out to him.';
        // $basic  = new \Vonage\Client\Credentials\Basic($key, $secret);
        // $client = new \Vonage\Client($basic);
        // $message = $client->message()->send([
        // 'to' => '19292684435',
        // 'from' => '18337222376',
        // 'text' => $sendtexttoadmin
        // ]);


        return redirect()->route('formsuccess')->with('success', 'Thank You.');
    }
    public function get_state_by_country(Request $request){
        try {
            $states = State::where('country_id',$request->country_id)->get();
            return $states;
        } catch (\Throwable $th) {
            return "Something Wrong";
        }

    }
    public function get_city_by_state(Request $request){
        try {
            $cities = City::where('state_id', $request->state_id)->get();
            return $cities;
        } catch (\Throwable $th) {
            return "Something is Wrong";
        }
    }
}
