<?php
Route::resource('numbertoroman', 'NumberToRomanController', ['only' => ['create', 'store', 'show', 'index']]);
