<?php

namespace App\Http\Controllers;

use Auth;
use App\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the outlet.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('manage_outlet');

        $myid = Auth::user()->id;
        $mine_User = Outlet::where('user_id','=',$myid)->first();

        $User_onUser = \App\User::where('id','=',$myid)->first();

        $outletQuery = Outlet::query();
        $outletQuery->where('name', 'like', '%'.request('q').'%');
        $outlets = $outletQuery->paginate(25);

        return view('outlets.index', compact('outlets','mine_User','User_onUser'));
    }

    /**
     * Show the form for creating a new outlet.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // $this->authorize('create', new Outlet);

        return view('outlets.create');
    }

    /**
     * Store a newly created outlet in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        if ($request->password == $request->password2) {
        
            if (filter_var($request->name, FILTER_VALIDATE_INT)) {
                return redirect()->back()->with('gagal','Nama harus berupa Huruf');
            }else{
            $cek = \App\User::where('email','=',$request->email)
                ->first();
            if (empty($cek)) {    
            $newOutlet = $request->validate([
                'name'      => 'required|max:60',
                'address'   => 'nullable|max:255',
                'latitude'  => 'nullable|required_with:longitude|max:15',
                'longitude' => 'nullable|required_with:latitude|max:15',
            ]);

            $u = new \App\User;
            $u->id = mt_rand(1000,9999);
            $newOutlet['user_id'] = $u->id;
            $u->role = 'mitra';
            $u->email = $request->email;
            $u->password = bcrypt($request->password);
            $u->name = $request->name;                   

            $u->save();

            $outlet = Outlet::create($newOutlet);

            return redirect('/login');
            }else{
                return redirect()->back()->with('gagal','Email telah digunakan, cobalah email lain');
                }    
            }
        }else{
            return redirect()->back()->with('gagal','Konfirmasi Password tidak sesuai');
        }
    }

    /**
     * Display the specified outlet.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\View\View
     */
    public function show(Outlet $outlet)
    {
        return view('outlets.show', compact('outlet'));
    }

    public function edit(Outlet $outlet)
    {
        // $this->authorize('update', $outlet);

        return view('outlets.edit', compact('outlet'));
    }

    /**
     * Update the specified outlet in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Outlet $outlet)
    {
        $this->authorize('update', $outlet);

        $outletData = $request->validate([
            'name'      => 'required|max:60',
            'address'   => 'nullable|max:255',
            'latitude'  => 'nullable|required_with:longitude|max:15',
            'longitude' => 'nullable|required_with:latitude|max:15',
        ]);
        $outlet->update($outletData);

        return redirect('/outlets');
    }

    /**
     * Remove the specified outlet from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Outlet $outlet)
    {
        $this->authorize('delete', $outlet);

        $request->validate(['outlet_id' => 'required']);

        if ($request->get('outlet_id') == $outlet->id && $outlet->delete()) {
            return redirect()->route('outlets.index');
        }

        return back();
    }
}
