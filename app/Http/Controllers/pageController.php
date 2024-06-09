<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komiks;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class pageController extends Controller
{
    public function home(){
        return view ("home", ["key" => "home"]);
    }
    public function komiks(){
        $komiks = Komiks::orderBy('id','desc')->get();
        return view ("Komiks", ["key" => "Komiks", "KM" => $komiks]);
    }
    public function formAdd(){
        return view ("formadd", ["key" => "formAdd"]);
    }
    public function save(Request $request){
        $file_name = time()."_".$request->file('poster')->getClientOriginalName();
        $path = $request->file('poster')->storeAs('poster', $file_name,'public');

        Komiks::create([
            'title'=> $request->title,
            'genre'=> $request->genre,
            'year' => $request->year,
            'poster' => $path
        ]);
        return redirect("Komiks")->with('alert', 'data berhasil di simpan');
        
    }
    public function editForm($id){
        $komiks = Komiks::find($id);
        return view ("FormEdit", ["key" => "FormEdit", "KM" => $komiks]);

        // return view ("FormEdit", ["key" => "edit"]);
    }
    public function update(Request $request, $id){
        
        
        $komik = Komiks :: find($id);

        $komik->title = $request->title;
        $komik->genre = $request->genre;
        $komik->year = $request->year;
    
        if ($request->poster){
            if ($komik->poster){
                Storage::disk('public')->delete($komik->poster);
            }
        $file_name = time()."_".$request->file('poster')->getClientOriginalName();
        $path = $request->file('poster')->storeAs('poster', $file_name,'public');
        $komik->poster = $path;
        }
        $komik->save();
        return redirect("/Komiks")->with('alert','data berhasil di ubah');
    }
    public function delete($id){
        $komik = Komiks::find($id);

        if ($komik->poster)
        {
            Storage::disk('public')->delete($komik->poster);
        }
        $komik->delete();
        return redirect("/Komiks")->with('alert','data berhasil di hapus');
        }
    public function login(){
        return view("/login");
    }
    public function editUser(Request $request){
        return view ("editUser", ["key"=>""]);
    }
    public function updateuser(Request $request){
        if(Auth::attempt(['email' => Auth::user()->email, 'password' => $request->password_lama])){
            if($request->password_baru == $request->confirmasi_password){
                Auth::user()->password = bcrypt($request->password_baru);
                Auth::user()->save();
                return redirect("/user")->with("info","password berhasil di ubah");
            } else {
                return redirect("/user")->with("info","konfirmasi password tidak sama");
            }
        } else {
            return redirect("/user")->with("info","password lama salah");
        }
    }
   
}

