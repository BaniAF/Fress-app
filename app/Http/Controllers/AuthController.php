<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
   public function login()
   {
      return view('Landing.Pages.signin');
   }

   public function signup()
   {
      return view('Landing.Pages.signup');
   }

   public function processlogin(Request $request): RedirectResponse
   {
      // dd($request->all());
      $request -> validate([
         'email' => 'required',
         'password' => 'required',
      ]);

      $credentials = [
         'email' => $request->email,
         'password' => $request->password,
      ];

      if(Auth::guard('web')->attempt($credentials)){
         $request->session()->regenerate();
         return redirect()->route('admin');
      }
      if(Auth::guard('peserta')->attempt($credentials)){
         $request->session()->regenerate();
         return redirect()->route('user');
      }else{
         return redirect()->route('login')->with('failed', 'Email atau Password Salah!');
      }

   }

   public function saveSignup(Request $request)
   {
      // $validatedData = $request->validate([
      //    'email' => 'required|email|unique:peserta',
      //    'username' => 'required',
      //    'password' => 'required|min:8',
      //    'nama' => 'required',
      //    'alamat' => 'required',
      //    'posisi' => 'required',
      //    'klub' => 'required',
      // ]);

      // dd($request->all());

      $totalUsers = peserta::count();
      $lastId = $totalUsers + 1;
      $newId = 'AK' . str_pad($lastId, 3, '0', STR_PAD_LEFT);

      //dd($newId);

      $peserta = new Peserta();
      $peserta->id = $newId;
      $peserta->email = $request->email;
      $peserta->username = $request->username;
      $peserta->password = bcrypt($request->password);
      $peserta->password_lihat = $request->password;
      $peserta->nama = $request->nama;
      $peserta->alamat = $request->alamat;
      $peserta->posisi = $request->posisi;
      $peserta->klub = $request->klub;

      $peserta->save();

      alert()->success('Sukses', 'Anda Berhasil Mendaftar!');
      return redirect('/login');
   }

   public function logout()
   {
      Auth::logout();
      return redirect('/');
   }
}
