<?php

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(fn() => Order::factory()->create());

$orderNumber = date('Ymd') . 1;

test('Orders index returns success', function () {
    $response = $this->get(route('orders'));

    $response->assertStatus(200);
});

test('Orders index returns correct JSON structure', function () {
    $response = $this->get(route('orders'));

    $response->assertJsonStructure([
        'data',
        'links',
        'meta',
    ]);
});

test('Single order returns success', function () use ($orderNumber) {
    $response = $this->get(route('orders.get', $orderNumber));

    $response->assertStatus(200);
});

test('Single order returns correct JSON structure', function () use ($orderNumber) {
    $response = $this->get(route('orders.get', $orderNumber));

    $response->assertJsonStructure([
        'data',
    ]);
});

it('can create order', function () {
    $response = $this->post(route('orders.post'), [
        'country' => 'lt',
        'proxy_count' => 25,
        'title' => 'My order',
    ]);

    $response->assertJsonStructure([
        'data',
    ]);
});

it('has order', function () use ($orderNumber) {
    $this->assertDatabaseHas('orders', [
        'order_number' => $orderNumber,
    ]);
});
