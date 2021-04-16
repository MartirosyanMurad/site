<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Support\Facades\Auth;
use JsonException;
use JsonRpc\Client;

/**
 * @package App\Repository
 */
class BalanceRepository
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client(getenv('BALANCE_HOST'));
    }

    /**
     * @param int $userId
     *
     * @return array|string[]
     */
    public function getBalance(int $userId): array
    {


        $this->client->call('balance.userBalance', ["user_id" => $userId]);

        $data = [];
        if (is_null($this->client->result)) {
            $data['balance_error'] = $this->client->error;
        } else {
            $data['balance'] = $this->client->result;
        }

        return $data;
    }

    /**
     * @param int $userId
     *
     * @return array
     * @throws JsonException
     */
    public function getHistory(int $userId): array
    {
        $this->client->call('balance.history', ["user_id" => $userId, "limit" => 10]);

        $data = [];
        if (is_null($this->client->result)) {
            $data['history_error'] = $this->client->error;
        } else {
            $data['histories'] = json_decode($this->client->result, true, 512, JSON_THROW_ON_ERROR);
        }

        return $data;
    }

}
