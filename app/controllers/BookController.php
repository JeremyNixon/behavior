<?php

	class BookController extends \BaseController {



		public function postCreate() {

	    $book = new Book();
	    $book->user_id = Auth::user()->id;
	    $book->fill(Input::all());
	    $book->save();
	    $id = $book->id;

	    return View::make('behavior/book-reviews');

	}

}
