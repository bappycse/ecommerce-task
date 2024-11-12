<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return Product::select('id', 'name')
            ->withCount(['orders as total_sales' => function ($query) {
                $query->where('status', 'completed');
                $query->orderBy('created_at', 'desc');
            }])
            ->orderByDesc('total_sales')
            ->limit(5)
            ->get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $post = $this->find($id);
        return $post ? $post->update($data) : null;
    }

    public function delete($id)
    {
        $post = $this->find($id);
        return $post ? $post->delete() : null;
    }
}
