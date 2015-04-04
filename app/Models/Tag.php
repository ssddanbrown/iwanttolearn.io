<?php namespace Learn\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $table = 'tags';
    protected $fillable = ['name', 'slug', 'description'];

    // Relations
    public function resources()
    {
        return $this->morphedByMany('Learn\Models\Resource', 'taggable');
    }

    public function articles()
    {
        return $this->morphedByMany('Learn\Models\Article', 'taggable');
    }

    public function link()
    {
        return '/t/' . $this->slug;
    }
}
