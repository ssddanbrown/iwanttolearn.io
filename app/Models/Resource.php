<?php namespace Learn\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Sourceable {

	protected $table = 'resources';

    protected $fillable = ['name', 'description', 'link', 'cost'];

    // Helpers

    /**
     * Returns a shortened url for display purposes.
     *
     * @param int $length
     * @return string
     */
    public function getShortLink($length = 20)
    {
        return strlen($this->link) > $length ? substr($this->link, 0, $length) . '...'  : $this->link;
    }

    /**
     * Evaluates whether the resource is free.
     *
     * @return bool
     */
    public function isFree()
    {
        return $this->cost === 'free';
    }

    /**
     * Gets a cost message that briefly explains the pricing.
     *
     * @return string
     */
    public function getCostMessage()
    {
        if ($this->cost === 'paid') {
            return 'This resource costs money to use';
        } elseif ($this->cost === 'both') {
            return 'This resource has paid content as well as free content';
        }

        return 'This resource is free';
    }

}
