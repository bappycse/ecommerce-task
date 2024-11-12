<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $posts = $this->productRepository->all();
        return response()->json($posts);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $post = $this->productRepository->create($data);
        return response()->json($post, 201);
    }

    // Similar for other CRUD actions...
}
