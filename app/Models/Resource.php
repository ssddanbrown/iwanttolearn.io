<?php namespace Learn\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Taggable {

	protected $table = 'resources';

    protected $fillable = ['name', 'description', 'link', 'cost'];

    // Helpers
    public function getShortLink($length = 20)
    {
        return strlen($this->link) > $length ? substr($this->link, 0, $length) . '...'  : $this->link;
    }

}
