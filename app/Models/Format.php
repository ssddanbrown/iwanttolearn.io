<?php namespace Learn\Models;

use Illuminate\Database\Eloquent\Model;

class Format extends Model {

	protected $table = 'formats';
    protected $fillable = ['name', 'icon'];

    public function getIconCode()
    {
        return '<i class="fa fa-' . $this->icon . '"></i>';
    }

}
