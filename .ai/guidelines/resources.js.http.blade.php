# Frontend HTTP requests

- Every call to an API route goes through `useHttp()` from `@inertiajs/vue3`. Never `fetch()`, never `XMLHttpRequest`, and never an HTTP library: no `axios`, no `ky`, no `got`, no `superagent`. Axios is not a dependency of this app and must not become one.
- Use the documented `get()`, `post()`, `put()`, `patch()`, `delete()`, or `submit()` methods with the endpoint URL and optional lifecycle callbacks. For application routes, use the Wayfinder route object's `.url(...)` when passing the endpoint to these methods. These methods return a promise that resolves with the parsed JSON response; do not pass the route object itself.
- Initialize request data on the hook, for example `const form = useHttp({ name: '' })`, then update `form.name` before calling `form.post(url)`. Request data is sent from the hook instance.
- Read state off the hook instead of tracking it by hand: `processing`, `errors`, `hasErrors`, `wasSuccessful`, `recentlySuccessful`, `progress`, and `isDirty`. Validation errors are exposed through `errors`; `cancel()` aborts, `optimistic()` updates data before the response lands, and `withPrecognition()` enables real-time validation.
- `useHttp` is for JSON endpoints and performs no Inertia visit: the page does not change. Page transitions and form submissions that should navigate keep using `router` and `useForm`.
- `resources/js/composables/useTwoFactorAuth.ts` is the reference implementation in this app.

@boostsnippet('Example useHttp calls', 'ts')
import { useHttp } from '@inertiajs/vue3';
import { search } from '@/actions/App/Http/Controllers/SearchController';

const http = useHttp({ query: '' });

async function search(): Promise<void> {
    const results = await http.get(search.url(), {
        onSuccess: (data) => {
            console.log(data);
        },
    });

    console.log(results);
}
@endboostsnippet
