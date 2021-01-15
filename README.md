# Laravel Nova Auth Captcha

[![Latest Version](http://img.shields.io/packagist/v/soluzione-software/nova-resource-table-footer.svg?label=Release&style=for-the-badge)](https://packagist.org/packages/soluzione-software/nova-resource-table-footer)
[![MIT License](https://img.shields.io/github/license/soluzione-software/nova-resource-table-footer.svg?label=License&color=blue&style=for-the-badge)](https://github.com/soluzione-software/nova-resource-table-footer/blob/master/LICENSE.md)

> Note the package is currently in beta. During the beta period things can and probably will change. Don't use it in production until a stable version has been released. We appreciate you helping out with testing and reporting any bugs.

The package allows to customize the footer(rows and columns) in Nova Resource table.

## Installation & Configuration

```bash
composer require soluzione-software/nova-resource-table-footer
```

```php
<?php

namespace App\Nova;

use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Http\Requests\NovaRequest;
use SoluzioneSoftware\NovaResourceTableFooter\Contracts\HasFooter;

class User extends Resource implements HasFooter {
    // ...
    
    public function getFooter(NovaRequest $request, Builder $query): array
    {
        return [ // <tfoot>
            [ // <tr>
                [ // <td> 
                    'attributes' => [ // <td ... v-bind="attributes">
                        'colspan' => 5,
                        //'rowspan' => 1,
                     ],
                    'content' => '<span>...</span>', // html content
                 ], // </td>
            ], // </tr>
        ]; // </tfoot>
    }
}
```
