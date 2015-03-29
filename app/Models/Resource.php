<?php namespace Learn\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model {

	protected $table = 'resources';

    protected $fillable = ['name', 'description', 'link', 'cost'];

    public function getShortLink($length = 20)
    {
        return strlen($this->link) > $length ? substr($this->link, 0, $length) . '...'  : $this->link;
    }

}
