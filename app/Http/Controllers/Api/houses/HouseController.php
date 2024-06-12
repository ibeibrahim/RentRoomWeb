<?php

namespace App\Http\Controllers\Api\Houses;
use App\House;
use App\Area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Booking;
use Illuminate\Support\Facades\Auth;

class HouseController extends Controller {
    public function allHouses(){
        $houses = House::all()->where('status', 1);
        return response()->json(compact('houses'), 201);
    }

    public function highToLow()
    {
        $houses = House::all()->where('status', 1)->sortBy('rent', descending:true);
        $areas = Area::all();
        return response()->json(compact('houses', 'areas'), 201);
    }

    public function lowToHigh()
    {
        $houses = House::all()->where('status', 1)->sortBy('rent', descending:false);
        $areas = Area::all();
        return response()->json(compact('houses', 'areas'), 201);
    }

    public function details($id){
        $house = House::findOrFail($id);
        return view('houseDetails', compact('house'));
    }
    public function areaWiseShow($id){
        $area = Area::findOrFail($id);
        $houses = House::where('area_id', $id)->get();
        // return view('areaWiseShow', compact('houses', 'area'));
        return response()->json(compact('houses', 'area'), 201);
    }

    public function search(Request $request){
        
        $room = $request->room;
        $bathroom = $request->bathroom;
        $rent = $request->rent;
        $address = $request->address;
        

        if( $room == null && $bathroom == null && $rent == null && $address == null){
            // session()->flash('search', 'Your have to fill up minimum one field for search');
            // return redirect()->back();
            return response()->json('U have to fill up minimum one field for search', 401);
        }

        $houses = House::where('rent', 'LIKE', $rent)
            ->where('number_of_toilet', 'LIKE', $bathroom)
            ->where('number_of_room', 'LIKE',  $room)
            ->where('address', 'LIKE', "%$address%")
            ->get();
        return response()->json(compact('houses', 'room'), 201);
    }

    public function searchByRange(Request $request){
        $digit1 =  $request->digit1;
        $digit2 =  $request->digit2;
        if($digit1 > $digit2){
            $temp = $digit1;
            $digit1 =  $digit2;
            $digit2 = $temp;
        }
        $houses = House::all()->whereBetween('rent',[$digit1, $digit2])->sortBy('rent');
        return response()->json(compact('houses'), 200);
    }


    public function booking($house){
        
        // if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2){
        //     session()->flash('danger', 'Sorry admin and landlord are not able to book any houses. Please login with renter account');
        //     return redirect()->back();
        // }


        $house = House::findOrFail($house);
        $landlord = User::where('id', $house->user_id)->first();

        if(Booking::where('address', $house->address)->where('booking_status', "booked")->count() > 0){
            session()->flash('danger', 'This house has already been booked!');
            return redirect()->back();
        }



        if(Booking::where('address', $house->address)->where('renter_id', Auth::id())->where('booking_status', "requested")->count() > 0){
            session()->flash('danger', 'Your have already sent booking request of this home');
            return redirect()->back();
        }


       

    
        //find current date month year
        // $now = Carbon::now();
        // $now = $now->format('F d, Y');
        
        
        $booking = new Booking();
        $booking->address = $house->address;
        $booking->rent = $house->rent;
        $booking->landlord_id = $landlord->id;
        $booking->renter_id = Auth::id();
        $booking->save();


        session()->flash('success', 'House Booking Request Send Successfully');
        return redirect()->back();
 

    }

}

