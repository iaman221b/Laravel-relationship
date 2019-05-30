<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;
use App\Blog;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events =   Event::with('carts')->get();
        $events = $events->map(function ($event, $index) {
            $islogin = false;
            if (Auth::check()){
                $islogin = true;
            }

            $isShowBuyButton = true;
            if (Auth::check()) {
                $cart = $event->carts->where('user_id', auth()->id())->first();
                if ($cart) {
                    $isShowBuyButton = false;
                }
            }
            $event['isShowBuyButton'] = $isShowBuyButton;

            return $event; 
        });
        $events = collect( $events);
        return view('event.index' , compact('events' , 'islogin'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => ['required', 'min:3' , 'max:255'] ,
            'description' => ['required', 'min:3' , 'max:255'] ,
            'price' => ['required', 'min:3' , 'max:255'] 
        ]);

     

        Event::create($attributes);
        // dd("working"); 
            return redirect('/event/show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
   

    public function show(Event $event ,  Request $request){      
        $event->load('carts');
        $isShowBuyButton = true;
        if (Auth::check()) {
            $cart = $event->carts->where('user_id', auth()->id())->first();
            if ($cart) {
                $isShowBuyButton = false;
            }
        }
        // dd( $isShowBuyButton); 
        $event['isShowBuyButton'] = $isShowBuyButton;
        return view('event.show' , compact('event'));
    }

    public function cart($id ,  Request $request){
        // if (Auth::check()){
        //     $user = User::find(auth()->id());
        // }
        
        $ischeck = true;
        if (!Auth::check()){
            // return redirect('even.');
            $ischeck = false;
        }
        $event = Event::find($id);
        // $attributes = request()->validate([
        //     'address' => ['required', 'min:3' , 'max:255'] ,
                       
        // ]);   
        $attributes['address'] = request()->address;
        $attributes['coupon'] = request()->coupon;
        if (Auth::check()){
        $attributes['user_id'] = auth()->id();
        }
        $attributes['event_id'] = $event->id;
        if(request('coupon') == "BOH232"){ 
            $attributes['updated_Price'] = ($event->price) - (($event->price)/5) ;
        }
        else{   
        $attributes['updated_Price'] = ($event->price);
        }
        $cart = Cart::create($attributes);
        $event_name = $event->name;

        
        
        return redirect("/event/show" )->with('success' ,  "Thank you registering for JCB $event_name");
        // return view('event.success' , compact('event' , 'ischeck')); 
    }
    public function redirect_login($id){
        $ischeck = true;
        if (!Auth::check()){
            // return redirect('even.');
            $ischeck = false;
        }
        // session('url.intended',route('show_single_event', $id));
        session(['url.intended' => route('show_single_event', $id ,  $ischeck)]);
        // dd(session("url.intended")); 
        return redirect('/user/login');
    }

    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
       $cart = Cart::where('user_id', auth()->id())->where('event_id', $event->id)->first();
       
       if($cart)
       {
        $cart->delete();
       }
       return redirect('/event/show');
    }

    public function show_event(){
        $users = User::with('carts')->get();
        $blog = Blog::all();
        $events = Event::all();
        if (($this->authorize('view'))){
            dd("show posts");
        }
    }
}
