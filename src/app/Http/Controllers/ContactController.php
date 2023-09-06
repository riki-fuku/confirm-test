<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::Paginate(10);
        return view('index', compact('contacts'));
    }

    public function search(Request $request)
    {
        $contacts = Contact::FullnameSearch($request->fullname)
            ->GenderSearch($request->gender)
            ->CreatedStartSearch($request->created_start)
            ->CreatedEndSearch($request->created_end)
            ->EmailSearch($request->email)
            ->Paginate(10);

        // 検索パラメータをページネーションリンクに追加
        $param = $request->only(['fullname', 'gender', 'created_start', 'created_end', 'email']);
        $contacts->appends($param);

        return view('index', compact('request', 'contacts'));
    }

    public function register(Request $request)
    {
        $data = $request->session()->get('input_data') ?? [];
        $request->session()->forget('input_data');
        return view('register', compact('data'));
    }

    public function confirm(ContactRequest $request)
    {
        $request->session()->put('input_data', $request->all());
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);
        return view('confirm', compact('contact'));
    }

    public function store(Request $request)
    {
        $contact = $request->only(['fullname', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);
        Contact::create($contact);
        return view('thanks');
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/');
    }
}
