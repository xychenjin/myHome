<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/23
 * Time: 14:45
 */
Route::group(['prefix'=>'card'], function(){
    Route::get('/', ['uses' => 'Card\\CardController@cardList', 'as' => 'card.list']);
});

//Route::resource('card', 'Card\\CardController');