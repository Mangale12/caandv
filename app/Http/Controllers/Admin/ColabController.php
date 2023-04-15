<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ColabController extends Controller
{
    public function saveNote(Request $request){
        $formdata = array(
            'note'       =>   isset($request->note)?($request->note):null,
        );
        $sql = FormNumber::find($request->cid);
        $sql->note = isset($request->note)?($request->note):null;

        if(!$sql->save()){
            return Response::json(['error' => $sql],404);
            // return redirect()->back()->withInput()->with('error', $sql);
        }

        // $sendtext = $request->phone_number . ' ' . 'has joined for vaccency .
        // Yayyy ';
        // $basic  = new \Vonage\Client\Credentials\Basic("e20bd554", "M5arJoXIrJ8Kat1r");
        // $client = new \Vonage\Client($basic);
        // $message = $client->message()->send([
        // 'to' => '19292684435',
        // 'from' => '18337222376',
        // 'text' => $sendtext
        // ]);
            return Response::json('Note Saved');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = FormNumber::orderBy('details->question','desc')->get();
        return view('admin.colab.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $colab = FormNumber::where('id',$id);
            if($colab->count() > 0){
                $colab = $colab->first();
                $colab->seen = '1';
                $colab->update();
                return view('admin.colab.list ',['colab'=>$colab]);
            }
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return 'Empty';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        FormNumber::where('id',$id)->delete();
        return back()->with('message', 'Deleted Successfully');
    }
    public function delete($id)
    {
        dd('hyayya');
        FormNumber::where('id',$id)->delete();
        return back()->with('message', 'Deleted Successfully');
    }
}
