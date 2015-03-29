<?php namespace Learn\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Sourceable {

	protected $table = 'articles';
    protected $fillable = ['title', 'description', 'link'];

    public function getShortLink($length = 20)
    {
        return strlen($this->link) > $length ? substr($this->link, 0, $length) . '...'  : $this->link;
    }

}
