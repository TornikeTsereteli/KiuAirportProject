<?php

namespace App\Http\Controllers;

use App\Repositories\RouteRepository;
use App\Repositories\RouteRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Mockery\Exception;

/**
 * @OA\Info(
 *     title="My API",
 *     version="1.0.0",
 *     description="API Documentation"
 * )
 *
 * @OA\PathItem (
 *     path="/"
 * )
 */

class RouteController extends Controller
{
    protected $routeRepository;

    public function __construct(RouteRepositoryInterface $routeRepository){
        $this->routeRepository = $routeRepository;
    }


    public function getRoutes(): Collection
    {
        return $this->routeRepository->getAll();
    }

    /**
     * @Route("/api/add-route", methods={"POST"})
     */
    public function addRoute(Request $request): void
    {

        $data = $request->validate([
            'start_location' => 'required',
            'end_location' => 'required',
            'price_per_ticket' => 'required',
        ]);

        $this->routeRepository->create($data);
    }

    /**
     * @OA\Get (
     *     path="/addnumber",
     *     summary="Add two numbers",
     *     description="This endpoint accepts two integers and returns their sum.",
     *     @OA\Parameter(
     *         name="a",
     *         in="query",
     *         description="The first number to add",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="b",
     *         in="query",
     *         description="The second number to add",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="The sum of the two numbers",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="result",
     *                 type="integer",
     *                 description="The sum of the two numbers"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input, expects two integers"
     *     )
     * )
     */

    public function addnumber(int $a, int $b): int
    {
        return $a + $b;
    }


}
