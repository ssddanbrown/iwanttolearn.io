<?php namespace Learn\Models;

use Illuminate\Database\Eloquent\Model;

class Format extends Model {

	protected $table = 'formats';
    protected $fillable = ['name', 'icon', 'plural', 'order'];

    public function getIconCode()
    {
        return '<i class="fa fa-' . $this->icon . '"></i>';
    }

    // Relations
    public function resources()
    {
        return $this->morphedByMany('Learn\Models\Resource', 'formattable');
    }

    public function articles()
    {
        return $this->morphedByMany('Learn\Models\Article', 'formattable');
    }

}
