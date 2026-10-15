<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EntryRequest;
use App\Http\Requests\ContactRequest;

class SiteController extends Controller
{
    public function say(string $message = 'Привіт')
    {
        return view('site.say', ['message' => $message]);
    }
    #lab2: case 3 delete later---------------------------------
    public function entry()
    {
        return view('site.entry');
    }

    public function entryStore(EntryRequest $request)
    {
        return view(
            'site.entry-confirm',
            $request->validated()
        );
    }

    #lab2: individual------------------------------
    public function contact()
    {
        return view('site.contact', ['cinemaName' => 'Кінотеатр']);
    }

    public function contactSubmit (ContactRequest $request)
    {
        return view('site.contact-success', [
            'cinemaName' => 'Кінотеатр',
            'contact' => $request->validated(),
        ]);
    }
}
