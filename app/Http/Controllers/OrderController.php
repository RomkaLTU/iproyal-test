<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderController extends Controller
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(): AnonymousResourceCollection
    {
        return OrderResource::collection(Order::paginate(25));
    }

    public function get(Order $order): OrderResource
    {
        return new OrderResource($order);
    }

    public function post(OrderRequest $request): OrderResource
    {
        $order = $this->orderService->submitOrder($request->data());

        return new OrderResource($order);
    }
}
