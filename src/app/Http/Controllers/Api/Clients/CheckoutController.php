<?php

namespace App\Http\Controllers\Api\Clients;

use App\Http\Controllers\Controller;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Exception\CardErrorException;
use App\Traits\ApiResponses;
use Symfony\Component\HttpFoundation\Response;

class CheckoutController extends Controller
{
    use ApiResponses;

    /**
     * The function handle checkout
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleCheckout(Request $request)
    {
        $stripe = new Stripe(config('services.stripe.secret'));
        try {
            $charge = $stripe::charges()->create([
                'amount' => $request->amount,
                'currency' => 'GBP',
                'source' => "hbhsbfdhsfbdhsfbhdsf",
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' => [
                    'contents' => $request->contents,
                    'quantity' => $request->quantity,
                    'discount' => "",
                ],
            ]);
            return $this->errorResponse(Response::HTTP_OK, 'Checkout success');
        } catch(CardErrorException $e) {
            return $this->errorResponse(Response::HTTP_BAD_REQUEST, 'Checkout failed');
        }
    }
}
