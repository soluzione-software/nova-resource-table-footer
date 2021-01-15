<?php

namespace SoluzioneSoftware\NovaResourceTableFooter\Http\Controllers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Response;
use SoluzioneSoftware\NovaResourceTableFooter\Contracts\HasFooter;
use SoluzioneSoftware\NovaResourceTableFooter\Http\Requests\Request;

class Controller extends \Illuminate\Routing\Controller
{
    public function __invoke(Request $request)
    {
        $resource = $request->newResource();

        if (!is_subclass_of($resource, HasFooter::class)) {
            return $this->response();
        }
        $query = $request->toQuery();
        return $this->response($resource->getFooter(
            $request,
            is_subclass_of($query, Relation::class) ? $query->getQuery() : $query
        ));
    }

    protected function response(array $data = [])
    {
        return Response::json(['footer' => $data]);
    }
}
