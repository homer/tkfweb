<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});

// Federasyon sayfalari
Route::get('/federasyon/tarihce', function(){
  return  View::make('federasyon/tarihce');
});
Route::get('/federasyon/yonetim', function(){
  return  View::make('federasyon/yonetim');
});
Route::get('/federasyon/kurullar', function(){
  return  View::make('federasyon/kurullar');
});
Route::get('/federasyon/anastatu', function(){
  return  View::make('federasyon/anastatu');
});
Route::get('/federasyon/talimatlar', function(){
  return  View::make('federasyon/talimatlar');
});
Route::get('/federasyon/olimpik-sporcular', function(){
  return  View::make('federasyon/olimpik-sporcular');
});
Route::get('/federasyon/milli-takim', function(){
  return  View::make('federasyon/milli-takim');
});
Route::get('/federasyon/il-temsilcilikleri', function(){
  return  View::make('federasyon/il-temsilcilikleri');
});
Route::get('/federasyon/gsb-birimleri', function(){
  return  View::make('federasyon/gsb-birimleri');
});
Route::get('/federasyon/il-mudurlukleri', function(){
  return  View::make('federasyon/il-mudurlukleri');
});
Route::get('/federasyon/federasyonlar', function(){
  return  View::make('federasyon/federasyonlar');
});


// Listeler ve Detaylari
Route::get('/liste/sporcular', function(){
  $sportsmen = DB::table('sportsmen')
      ->join('clubs', 'sportsmen.club_id', '=', 'clubs.id')
      ->select('sportsmen.id', 'sportsmen.first_name', 'sportsmen.last_name', 'clubs.club_name')
      ->orderBy('sportsmen.first_name')
      ->get();

  return  View::make('liste/sporcular')->with('sportsmen',$sportsmen);
});
Route::get('/liste/sporcular/{man_id}',function($man_id){
  $man = DB::table('sportsmen')
      ->where('sportsmen.id',$man_id)
      ->join('clubs', 'sportsmen.club_id', '=', 'clubs.id')
      ->select('sportsmen.id', 'sportsmen.first_name', 'sportsmen.last_name', 'clubs.club_name')
      ->first();

  return View::make('liste/sporcu-detay')->with('man',$man);
});
Route::get('/liste/kulupler', function(){
  $clubs = DB::table('clubs')
      ->orderBy('club_name')
      ->select('id', 'club_name')
      ->get();
  return  View::make('liste/kulupler')->with('clubs',$clubs);
});
Route::get('/liste/kulupler/{club_id}', function($club_id){
  $club = DB::table('clubs')
      ->where('clubs.id',$club_id)
      ->select('clubs.id', 'clubs.club_name')
      ->first();

  return  View::make('liste/kulup-detay')->with('club',$club);
});

// Medya Arsivi
Route::get('/medya/foto-galeri', function(){
  return  View::make('medya/foto-galeri');
});
Route::get('/medya/video-galeri', function(){
  return  View::make('medya/video-galeri');
});

// Admin
Route::get('/vezir/giris',function(){
  return View::make('vezir/giris');
});
Route::post('/vezir/giris',function(){
  $credentials = Input::only('username','password');
  if(Auth::attempt($credentials)){
    return Redirect::intended('/vezir/yeni-kullanici');
  }
  return Redirect::to('vezir/giris');
});

Route::get('/vezir/cikis',function(){
  Auth::logout();
  return View::make('vezir/cikis');
});

Route::get('/vezir/yeni-kullanici',array(
  'before' => 'auth',
  function(){
    return View::make('vezir/yeni-kullanici');
  }
));
Route::post('/vezir/yeni-kullanici',array(
  'before' => 'auth',
  function(){
    $user = new User();
    $user -> email = Input::get('email');
    $user -> username = Input::get('username');
    $user -> password = Hash::make(Input::get('password'));
    $user -> save();

    return "Kayit basariyla gerceklesti";
  }
));

Route::get('/vezir/yeni-sporcu', function(){
  $clubs = DB::table('clubs')->orderBy('club_name')->lists('club_name','id');
  return  View::make('vezir/yeni-sporcu')->with('clubs',$clubs);
});
Route::post('/vezir/yeni-sporcu', function(){
  $clubs = DB::table('clubs')->orderBy('club_name')->lists('club_name','id');

  $sportsman = new Sportsmen();
  $sportsman -> first_name = Input::get('f_name');
  $sportsman -> last_name = Input::get('l_name');
  $sportsman -> club_id = Input::get('club');
  $sportsman -> save();

  return  View::make('vezir/yeni-sporcu', array(
      's_name'=>$sportsman->first_name,
      'clubs'=>$clubs
  ));
});

Route::get('/vezir/yeni-kulup', function(){
  return  View::make('vezir/yeni-kulup');
});
Route::post('/vezir/yeni-kulup', function(){
  $club = new Club();
  $club -> club_name = Input::get('c_name');
  $club -> save();

  return  View::make('vezir/yeni-kulup')->with('club',$club);
});