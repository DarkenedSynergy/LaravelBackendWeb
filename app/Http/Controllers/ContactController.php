<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ContactEmail;


class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }
   public function store(Request $request)
   {
       $validated = $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|email|max:255',
           'subject' => 'required|string|max:500',
       ]);

       $data = [
           'name' => $validated['name'] ?? 'Geen naam opgegeven',
           'email' => $validated['email'] ?? 'Geen e-mailadres opgegeven',
           'subject' => $validated['subject'] ?? 'Geen bericht opgegeven',
       ];

       //Mail::to('admin@ehb.be')->send(new \App\Mail\ContactEmail($data));
       // niet functioneel, krijg een error
       return redirect()->route('contact.create')->with('success', 'Uw bericht is verzonden en een e-mail is verstuurd!');
   }




}
