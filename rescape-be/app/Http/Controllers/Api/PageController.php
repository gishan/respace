<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PageController extends Controller
{
    /**
     * Get all pages
     */
    public function index(): AnonymousResourceCollection
    {
        $pages = Page::with(['parent', 'children'])->get();
        return PageResource::collection($pages);
    }

    /**
     * Get a specific page by slug
     */
    public function show(Page $page): PageResource
    {
        $page->load(['parent', 'children']);
        return new PageResource($page);
    }

    /**
     * Get pages by parent ID
     */
    public function getByParent(?int $parentId = null): AnonymousResourceCollection
    {
        $pages = Page::where('parent_id', $parentId)
            ->with(['parent', 'children'])
            ->get();
        return PageResource::collection($pages);
    }

    /**
     * Get page by layout type
     */
    public function getByLayout(string $layout): AnonymousResourceCollection
    {
        $pages = Page::where('layout', $layout)
            ->with(['parent', 'children'])
            ->get();
        return PageResource::collection($pages);
    }

    /**
     * Search pages
     */
    public function search(Request $request): AnonymousResourceCollection
    {
        $query = $request->get('query');
        
        $pages = Page::where('title', 'like', "%{$query}%")
            ->orWhere('slug', 'like', "%{$query}%")
            ->with(['parent', 'children'])
            ->get();
            
        return PageResource::collection($pages);
    }
}
