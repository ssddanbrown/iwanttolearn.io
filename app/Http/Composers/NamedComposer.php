<?php namespace Learn\Http\Composers;

use Illuminate\Contracts\View\View;

/**
 * Class NamedComposer
 *
 * Gets the name of the view file and calls a method
 * of the same name.
 * For example, A template with the name forms.users-list
 * will call the usersList function.
 *
 * @package Learn\Http\Composers
 */
class NamedComposer {
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $name = $view->name();
        $nameArray = explode('.', $name);
        $name = end($nameArray);
        $method = camel_case($name);
        if (is_callable([$this, $method])) {
            $this->$method($view);
        };
    }
}