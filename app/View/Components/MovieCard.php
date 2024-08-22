<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MovieCard extends Component
{
    /**
     * Create a new component instance.
     */

    public $title;
    public $movies;
    public $genres;
    public function __construct($title, $movies, $genres)
    {
        $this->title = $title;
        $this->movies = $movies;
        $this->genres = $genres;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.movie-card');
    }
}