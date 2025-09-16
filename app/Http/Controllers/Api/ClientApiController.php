<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ClientUpdateRequest;

class ClientApiController extends Controller
{
    public function index() { return Client::orderBy('id','desc')->paginate(10); }

    public function store(ClientStoreRequest $request)
    {
        $c = Client::create($request->validated());
        return response()->json($c, 201);
    }

    public function show(Client $client) { return $client; }

    public function update(ClientUpdateRequest $request, Client $client)
    {
        $client->update($request->validated());
        return $client->fresh();
    }

    public function destroy(Client $client) { $client->delete(); return response()->noContent(); }
}
