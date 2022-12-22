<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Http\Resources\QuoteResource;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return QuoteResource::collection(Quote::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuoteRequest  $request
     * @return \App\Http\Resources\QuoteResource
     */
    public function store(StoreQuoteRequest $request)
    {
        /** @var array $data */
        $data = $request->validated();

        return new QuoteResource(Quote::create($data));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \App\Http\Resources\QuoteResource.
     */
    public function show(Quote $quote)
    {
        return new QuoteResource($quote);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuoteRequest  $request
     * @param  \App\Models\Quote  $quote
     * @return \App\Http\Resources\QuoteResource
     */
    public function update(UpdateQuoteRequest $request, Quote $quote)
    {
        /** @var array $data */
        $data = $request->validated();
        $quote->update($data);

        return new QuoteResource($quote);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        $quote->delete();

        return response()->noContent();
    }
}
