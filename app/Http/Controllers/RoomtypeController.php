<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Roomtypeimage;

class RoomtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=RoomType::all();
        return view('roomtype.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roomtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required',
            'detail'=>'required',
            'bintang'=>'required',
            'fasilitas'=>'required',
            'price'=>'required',
            
        ]);

        // $imgPath=$request->file('photo')->store('public/imgs');

        

        $data=new RoomType;
        $data->title=$request->title;
        $data->detail=$request->detail;
        $data->bintang = $request->bintang;
        $data->fasilitas = $request->fasilitas;
        $data->price=$request->price;
        $data->save();
        

        foreach($request->file('imghotel') as $img){
            $imgPath=$img->store('imghotel','public');
            $imgData=new Roomtypeimage;
            $imgData->room_type_id=$data->id;
            $imgData->img_src=$imgPath;
            $imgData->img_alt=$request->title;
            $imgData->save();
            
        }
        return redirect('admin/roomtype/create')->with('success', 'Data has been added.');

        //  untuk upload 1 image
        // if($request->hasFile('photo'))
        // {
        //     $file = $request->file('photo');
        //     $extention = $file->getClientOriginalExtension();
        //     $filename= time(). '.'.$extention;
        //     $file->move('uplimg/imghotel/', $filename);
        //     $data->photo = $filename;
        // }
        // $data->save();   

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=RoomType::find($id);
        return view('roomtype.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data=RoomType::find($id);
        $img=Roomtypeimage::where('room_type_id', $data->id)->get();
        return view('roomtype.edit',['data'=>$data, 'img'=>$img]);
        
        
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

        // $imgPath=$request->file('photo')->store('public/imgs');
        $data=RoomType::find($id);
        $data->title=$request->title;
        $data->detail=$request->detail;
        $data->bintang = $request->bintang;
        $data->fasilitas = $request->fasilitas;
        $data->price=$request->price;
        $data->save();

        return redirect('admin/roomtype/'.$id.'/edit')->with('success', 'Data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RoomType::where('id',$id)->delete();
        return redirect('admin/roomtype')->with('success', 'Data has been delete.');

    }
}
