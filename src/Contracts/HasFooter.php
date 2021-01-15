<?php

namespace SoluzioneSoftware\NovaResourceTableFooter\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Http\Requests\NovaRequest;

interface HasFooter
{
    /**
     * @param  NovaRequest  $request
     * @param  Builder  $query
     * @return array
     */
    public function getFooter(NovaRequest $request, Builder $query): array;
}
