<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EBookController extends Controller
{
    public function viewHome(){
        // dd(Auth::guard('account')->user());
        $ebooks = Ebook::all();
        return view('home', [
            'title' => 'Home',
            'ebooks' => $ebooks
        ]);
    }

    public function viewEBook($ebookId){
        $ebook = Ebook::where('ebook_id', $ebookId)->first();
        return view('ebook', [
            'title' => 'E-Book',
            'ebook' => $ebook
        ]);
    }
}
