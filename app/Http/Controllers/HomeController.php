<?php

namespace App\Http\Controllers;

use App\Repository\BalanceRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use JsonException;

class HomeController extends Controller
{
    private BalanceRepository $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->repository = new BalanceRepository();
    }

    /**
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws JsonException
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $balance  = $this->repository->getBalance($userId);
        $history = $this->repository->getHistory($userId);

        return view('home', array_merge($balance, $history));
    }
}
