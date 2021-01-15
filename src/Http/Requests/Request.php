<?php

namespace SoluzioneSoftware\NovaResourceTableFooter\Http\Requests;

use Laravel\Nova\Http\Requests\CountsResources;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Http\Requests\QueriesResources;

class Request extends NovaRequest
{
    use CountsResources, QueriesResources;

    public function rules()
    {
        return [];
    }
}
