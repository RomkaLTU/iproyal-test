<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('Orders index returns success', function () {
    $response = $this->get(route('orders'));

    $response->assertStatus(200);
});

test('Orders index returns correct JSON structure', function () {
    $response = $this->get(route('orders'));

    $response->assertJsonStructure([
        'status',
        'data',
    ]);
});

test('Single order returns success', function () {
    $response = $this->get(route('orders.get', 1111111));

    $response->assertStatus(200);
});

test('Single order returns correct JSON structure', function () {
    $response = $this->get(route('orders.get', 1111111));

    $response->assertJsonStructure([
        'status',
        'data',
    ]);
});

it('can create order', function () {
    $response = $this->post(route('orders.post'), [
        'country' => 'lt',
        'number' => 25,
        'title' => 'My order',
    ]);

    $response->assertJsonFragment([
        'status' => 'ok',
    ]);
});

it('has order', function () {
    $this->assertDatabaseHas('orders', [
        'orderNumber' => 111,
    ]);
});
