<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TvCard extends Component
{
    public $title;
    public $tvShows;
    public $genres;
    public function __construct($title, $tvShows, $genres)
    {
        $this->title = $title;
        $this->tvShows = $tvShows;
        $this->genres = $genres;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tv-card');
    }
}