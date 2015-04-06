<?php namespace Learn\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model {

	protected $table = 'feedback';
    protected $fillable = ['email', 'topic', 'message'];

}
