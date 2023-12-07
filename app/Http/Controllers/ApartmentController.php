<?php

namespace App\Http\Controllers;

use App\DTOs\ApartmentDTO;
use Illuminate\Http\JsonResponse;
use App\Contracts\ApartmentContract;
use App\Http\Requests\ApartmentsListRequest;
use App\Http\Resources\Apartment\ApartmentCollection;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ApartmentController extends Controller
{
    /**
     * @param ApartmentContract $apartmentService
     */
    public function __construct(private ApartmentContract $apartmentService)
    {
    }

    /**
     * @param ApartmentsListRequest $request
     * @return JsonResponse
     */
    public function list(ApartmentsListRequest $request): JsonResponse
    {
        $apartments = $this->apartmentService
            ->list($request->only([
                'name',
                'price',
                'bedrooms',
                'bathrooms',
                'storeys',
                'garages',
            ]));

        return response()->json(
            new ApartmentCollection($apartments),
            ResponseAlias::HTTP_OK
        );
    }

    /**
     * @param ApartmentDTO $apartmentDTO
     * @return JsonResponse
     */
    public function store(ApartmentDTO $apartmentDTO): JsonResponse
    {
        return response()->json(
            $this->apartmentService->store($apartmentDTO),
            ResponseAlias::HTTP_CREATED
        );
    }
}
