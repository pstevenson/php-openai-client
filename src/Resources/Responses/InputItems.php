<?php

namespace AssistantEngine\OpenAI\Resources\Responses;

use GuzzleHttp\Client;
use AssistantEngine\OpenAI\Types\Responses\InputItemsListResponse;

class InputItems
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * List input items.
     *
     * @return InputItemsListResponse
     */
    public function list($id): InputItemsListResponse
    {
        $response = $this->client->get('responses/' . $id . '/input_items');
        $data = json_decode($response->getBody()->getContents(), true);


        return InputItemsListResponse::fromArray($data);
    }
}