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

// Medya Arsivi
Route::get('/medya/foto-galeri', function(){
  return  View::make('medya/foto-galeri');
});
Route::get('/medya/video-galeri', function(){
  return  View::make('medya/video-galeri');
});

// Admin
Route::get('/vezir/yeni-sporcu', function(){
  return  View::make('vezir/yeni-sporcu')->with('clubs',array(
    'Club A',
    'Club B',
    'Club C',
    'Club D',
    'Club E'
  ));
});
Route::post('/vezir/yeni-sporcu', function(){
  $sportsman = new Sportsmen();
  $sportsman -> first_name = Input::get('f_name');
  $sportsman -> last_name = Input::get('l_name');
  $sportsman -> club_id = 1;
  $sportsman -> save();

  return  View::make('vezir/yeni-sporcu')->with('s_name',$sportsman->first_name);
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