# App/Http/Controllers guidelines

- Controllers are CRUD by design: their only public methods are `index`, `create`, `store`, `show`, `edit`, `update`, and `destroy`.
- Never add a custom method (`approve`, `pin`, `hold`, `export`, `fulfil`). Instead, find the resource being created, updated, or deleted, and give it its own controller:
  - Approving an order → `OrderApprovalController@store`. Rejecting it → `OrderRejectionController@store`.
  - Pinning an order → `OrderPinController@update`. Unpinning it → `OrderPinController@destroy`.
  - Holding an order → `OrderHoldController@store`. Releasing it → `OrderHoldController@destroy`.
  - Approving the selected orders in the fulfilment queue → `FulfilmentController@update`.
- When an endpoint really does not fit CRUD, that is the sign to use an invokable controller with a single `__invoke()` method, named after the thing, minimally: `ExportController`, not `PersonalDataExportController` or `ExportPersonalDataController`.
- Controller names are nouns, never verbs: `OrderStarController`, not `StarOrderController`.
- Controllers stay thin: resolve the form request, call one action (or query), and return a response.
- Controllers never authorize or validate anything: no `abort()`, `abort_if()`, `abort_unless()`, `throw_if()`, `throw_unless()`, `$request->validate()`, `Validator::make()`, or `ValidationException`. Every check lives in the form request of that endpoint.
- `tests/Unit/ArchTest.php` enforces this.

@boostsnippet('Example controller', 'php')
<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\CreateOrderStar;
use App\Actions\DeleteOrderStar;
use App\Http\Requests\CreateOrderStarRequest;
use App\Http\Requests\DeleteOrderStarRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Http\RedirectResponse;

final readonly class OrderStarController
{
    public function store(CreateOrderStarRequest $request, #[CurrentUser] User $user, Order $order, CreateOrderStar $action): RedirectResponse
    {
        $action->handle($user, $order);

        return back();
    }

    public function destroy(DeleteOrderStarRequest $request, #[CurrentUser] User $user, Order $order, DeleteOrderStar $action): RedirectResponse
    {
        $action->handle($user, $order);

        return back();
    }
}
@endboostsnippet
