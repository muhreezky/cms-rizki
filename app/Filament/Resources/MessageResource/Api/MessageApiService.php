<?php
namespace App\Filament\Resources\MessageResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\MessageResource;
use Illuminate\Routing\Router;


class MessageApiService extends ApiService
{
    protected static string | null $resource = MessageResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
