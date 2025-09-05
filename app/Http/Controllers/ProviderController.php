<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Category;
use App\Traits\PaginationTrait;
use Inertia\Inertia;
use Inertia\Response;

class ProviderController extends Controller
{
    use PaginationTrait;

    /**
     * Listing providers view
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        // categories should be fetched from cache
        $categories = Category::orderBy('name')->get();
        $categorySlug = ($request->query('category')) ? $request->query('category') : '';

        $allProviders = Provider::when($categorySlug, fn($q) =>
            $q->whereHas('category', fn($c) => $c->where('slug', $categorySlug)))->get();
        $providers = $this->generatePagination($allProviders, $request);

        return Inertia::render('ProvidersListing', [
            'providers' => $providers,
            'categories' => $categories,
            'selectedCategory' => $categorySlug
        ]);
    }

    /**
     * Single provider page
     *
     * @param string $slug
     * @return Response
     */
    public function show(string $slug): Response
    {
        $provider = Provider::where('slug', $slug)->firstOrFail();

        return Inertia::render('ProvidersSingle', [
            'provider' => $provider
        ]);
    }
}
