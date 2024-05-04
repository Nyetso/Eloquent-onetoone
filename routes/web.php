<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Address;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/insert', function(){
    $user = User::findOrFail(2);

    $address = new Address(['name'=>'123 puchong Malaysia']);

    $user->address()->save($address);
});

Route::get('/update', function(){
    $address = Address::whereUserId(1)->first();

    $address->name = "123 Petaling Malaysia";
    
    $address->save();
});

Route::get('/read', function(){
    $user = User::findOrFail(1);

    return $user->address->name;
});

Route::get('/delete', function(){
    $user = User::findOrFail(1)->address()->delete();

});