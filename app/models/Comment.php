<?php

class Comment extends Eloquent{
	
	protected $guarded = array('id', 'created_at', 'updated_at');
	
	public function user() {
		return $this->belongsTo('user');
	}
	
	public function post() {
		return $this->belongsTo('post');
	}
}

?>