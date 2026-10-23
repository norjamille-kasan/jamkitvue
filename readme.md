# Jamkit Vue

**Jamkit Vue** is an ultra-strict, type-safe [Laravel](https://laravel.com) starter kit built with [Inertia](https://inertiajs.com) and [Vue](https://vuejs.org), for developers who refuse to compromise on code quality. It is a repository template: clone it, run the setup, and start building.

It descends from the [Laravel Starter Kit (Inertia & Vue)](https://github.com/nunomaduro/laravel-starter-kit-inertia-vue) by [Nuno Maduro](https://x.com/enunomaduro) — see [Credits](#credits).

## What's Inside?

Modern PHP has evolved into a mature, type-safe language, yet many Laravel projects still operate with loose conventions and optional typing. This starter kit enforces:

- **Fully Actions-Oriented Architecture**: Every operation is encapsulated in a single-action class
- **Cruddy by Design**: Standardized CRUD operations for all controllers, actions, and Inertia & Vue pages
- **100% Type Coverage**: Every method, property, and parameter is explicitly typed
- **Zero Tolerance for Code Smells**: Rector, PHPStan, OxLint, and Oxfmt at maximum strictness catch issues before they become bugs
- **Immutable-First Architecture**: Data structures favor immutability to prevent unexpected mutations
- **Fail-Fast Philosophy**: Errors are caught at compile-time, not runtime
- **Automated Code Quality**: Pre-configured tools ensure consistent, pristine code across your entire team
- **Bun-Powered**: Leveraging Bun for blazing-fast dependency management
- **Just Better Laravel Defaults**: Thanks to **[Essentials](https://github.com/nunomaduro/essentials)** / strict models, auto eager loading, immutable dates, and more
- **AI Guidelines**: Integrated AI Guidelines to assist in maintaining code quality and consistency
- **Full Testing Suite**: More than 150 tests with 100% code coverage using Pest

## Getting Started

> **Requires [PHP 8.5+](https://php.net/releases/), [Bun](https://bun.sh) and a code coverage driver like [xdebug](https://xdebug.org/docs/install)**.

Create your application from this template with the **Use this template** button on GitHub, or clone it directly:

```bash
git clone https://github.com/norjamille-kasan/jamkitvue.git example-app
cd example-app
```

### Initial Setup

Complete the setup inside the project:

```bash
# Setup the project
composer setup

# Record the packages you trust with Laravel Vet
./vendor/bin/vet --init

# Start the development server
composer dev
```

### Optional: Browser Testing Setup

If you plan to use Pest's browser testing capabilities:

```bash
bun add playwright
bunx playwright install
```

### Verify Installation

Run the test suite to ensure everything is configured correctly:

```bash
composer test
```

You should see 100% test coverage and all quality checks passing.

## Available Tooling

### Development

- `composer dev` - Starts Laravel server, queue worker, log monitoring, and Vite+ dev server concurrently

### Code Quality

- `composer lint` - Runs Rector (refactoring), Pint (PHP formatting), and Oxfmt (JS/TS formatting)
- `composer test:lint` - Dry-run mode for CI/CD pipelines

### Testing

- `composer test:type-coverage` - Ensures 100% type coverage with Pest
- `composer test:types` - Runs PHPStan at level 9 (maximum strictness)
- `composer test:unit` - Runs Pest tests with 100% code coverage requirement
- `composer test` - Runs the complete test suite (linting, static analysis, type coverage, unit tests)

### Maintenance

- `composer update:requirements` - Updates all PHP and Bun dependencies to latest versions

## Credits

This template is based on the [Laravel Starter Kit (Inertia & Vue)](https://github.com/nunomaduro/laravel-starter-kit-inertia-vue) created by **[Nuno Maduro](https://x.com/enunomaduro)**. The original architecture, tooling configuration, and guidelines are his work; this repository carries my own branding and adjustments on top of it.

## License

**Jamkit Vue** is open-sourced software licensed under the **[MIT license](https://opensource.org/licenses/MIT)**. See [LICENSE](LICENSE) for the full text and copyright notices.
