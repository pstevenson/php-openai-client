<?php

namespace AssistantEngine\OpenAI\Factories;

use AssistantEngine\OpenAI\Contracts\ResponseOutputItem;
use AssistantEngine\OpenAI\Types\Responses\Output\ResponseComputerToolCallOutput;
use AssistantEngine\OpenAI\Types\Responses\Output\FileSearchToolCallOutput;
use AssistantEngine\OpenAI\Types\Responses\Output\FunctionToolCallOutput;
use AssistantEngine\OpenAI\Types\Responses\Output\MessageOutput;
use AssistantEngine\OpenAI\Types\Responses\Output\WebSearchToolCallOutput;
use AssistantEngine\OpenAI\Types\Responses\Output\ReasoningOutput;

class ResponseOutputItemFactory
{
    public static function fromArray(array $data): ResponseOutputItem {
        $type = $data['type'] ?? '';
        return match ($type) {
            'message' => MessageOutput::fromArray($data),
            'file_search_call' => FileSearchToolCallOutput::fromArray($data),
            'function_call' => FunctionToolCallOutput::fromArray($data),
            'web_search_call' => WebSearchToolCallOutput::fromArray($data),
            'computer_call' => ResponseComputerToolCallOutput::fromArray($data),
            'reasoning' => ReasoningOutput::fromArray($data),
            default => throw new \Exception('Response output item type not found: ' . $type),
        };
    }
}