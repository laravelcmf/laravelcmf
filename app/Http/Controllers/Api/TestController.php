<?php

namespace App\Http\Controllers\Api;

use App\Test;

class TestController extends Controller
{
    public function index(Test $Test)
    {
        $test = Test::latest()->get();

        return response()->json($test);
    }

    public function store()
    {
        $test = Test::create($request->all());

        return response()->json($test, 201);
    }

    public function show($id)
    {
        $test = Test::findOrFail($id);

        return response()->json($test);
    }

    public function update($id)
    {
        $test = Test::findOrFail($id);
        $test->update($request->all());

        return response()->json($test, 200);
    }

    public function destroy($id)
    {
        Test::destroy($id);

        return response()->json(null, 204);
    }
}