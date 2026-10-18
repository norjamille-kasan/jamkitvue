# Frontend HTTP requests

- Every call to an API route goes through `useHttp()` from `@inertiajs/vue3`. Never `fetch()`, never `XMLHttpRequest`, and never an HTTP library: no `axios`, no `ky`, no `got`, no `superagent`. Axios is not a dependency of this app and must not become one.
- Pass a Wayfinder route to the hook, never a hand-written URL string: the route object to `submit()`, or its `.url(...)` to `get()`, `post()`, `put()`, `patch()` and `delete()`.
- The payload lives on the hook instance, not in the call: `const form = useHttp({ name: '' })`, then `form.name = 'x'` and `await form.put(update.url(id))`.
- Read state off the hook instead of tracking it by hand: `processing`, `errors`, `hasErrors`, `response`, `wasSuccessful`, `recentlySuccessful`, `progress`, `isDirty`. `cancel()` aborts, `optimistic()` (or the `optimistic` option) updates the UI before the response lands, `withPrecognition()` validates a field as the user types.
- `useHttp` is for JSON endpoints and performs no Inertia visit: the page does not change. Page transitions and form submissions that should navigate keep using `router` and `useForm`.
- `resources/js/composables/useTwoFactorAuth.ts` is the reference implementation in this app.

@boostsnippet('Example useHttp calls', 'ts')
import { useHttp } from '@inertiajs/vue3';
import { show, update } from '@/actions/App/Http/Controllers/OrderController';

const loadOrder = async (id: number): Promise<Order> => {
    const http = useHttp();

    // http.errors / http.hasErrors carry any failure.
    return (await http.submit(show(id))) as Order;
};

const renameOrder = async (id: number, name: string): Promise<void> => {
    const form = useHttp({ name: '' });
    form.name = name;

    await form.put(update.url(id));
};
@endboostsnippet
