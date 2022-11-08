<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Auth;

class HomeController extends Controller
{
   public function dashboard()
   {
    $checkouts = Checkout::with('camp')->whereUserId(Auth::id())->get();
 
    return view('user.dashboard', [
        'checkouts' => $checkouts
    ]);
   }
}
