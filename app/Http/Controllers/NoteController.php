<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Models\Note;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Miladshm\ControllerHelpers\Http\Traits\HasDestroy;
use Miladshm\ControllerHelpers\Http\Traits\HasShow;
use Miladshm\ControllerHelpers\Http\Traits\HasStore;
use Miladshm\ControllerHelpers\Http\Traits\HasUpdate;

class NoteController extends Controller
{
    use HasShow, HasStore, HasUpdate, HasDestroy;

    public function index($user_id): JsonResponse
    {
        return response()->json(Note::whereUserId($user_id)->get());
    }

    private function model(): Model
    {
        return new Note();
    }

    private function requestClass(): FormRequest
    {
        return new StoreNoteRequest();
    }

    protected function updateRequestClass(): ?FormRequest
    {
        return new UpdateNoteRequest();
    }
}
