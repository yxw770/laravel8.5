<?php
use \Illuminate\Support\Facades\Route;

Route::group(["prefix"=>"v1/admin","middleware"=>"AdminApiAuth"],function (){
    Route::get("/test","v1\\IndexController@test");
});
