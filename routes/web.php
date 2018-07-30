<?php

//" app.js >> mode:'history' " olduğu için bu şekilde düzenlendi.

Route::get('/',function(){
    return redirect('/phonebook');
});

Route::get('/phonebook/{name}', function () {
    return redirect('/phonebook');
})->where('name','[A-Za-z]+');

Route::resource('phonebook','PhonebookController');

Route::post('getData','PhonebookController@getData');