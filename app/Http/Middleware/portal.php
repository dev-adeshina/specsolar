<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class portal
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string $portal): Response
    {

        if (! $request->user()) {
            abort(401);
        }

        if ($request->user()->portal?->slug !== $portal) {
            return $this->switchRoute($request->user()->portal?->slug);
            
        }


        return $next($request);

    }


    public function switchRoute($portal)
    {
        switch ($portal) {
             case 'admin':
                 return redirect()->route('admin_dashboard');
                break;
            case 'cashier':
                 return redirect()->route('cashier_dashboard');
                break;
            case 'engineer':
                 return redirect()->route('engineer_dashboard');
                break;
            case 'customers':
                 return redirect()->route('customers_dashboard');
                break;
            case 'customerservice':
                 return redirect()->route('customerservice_dashboard');
                break;
            return false;
        }
           
            
    }
}
