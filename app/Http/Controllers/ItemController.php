<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemModifyRequest;
use App\Services\ItemService;

class ItemController extends Controller
{
    private $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }


    public function index()
    {
        $item = $this->itemService->index();
        return response([
            'success' => true,
            'data' => $item
        ], 200);
    }


    public function show($id)
    {
        $item = $this->itemService->show($id);
        if($item){
            return response([
                'success' => true,
                'data' => $item
            ], 200);
        }else{
            return 404;
        }
    }

    public function store(ItemCreateRequest $request)
    {
        $item = $this->itemService->create($request);
        if($item){
            return response([
                'success' => true,
                'data' => 'Item created.'
            ], 201);
        }
    }

    public function update(ItemModifyRequest $request, $id)
    {
        $item = $this->itemService->update($request, $id);
        if($item){
            return response([
                'success' => true,
                'data' => 'Item updated.'
            ], 200);
        }else{
            return 404;
        }
    }

    public function destroy($id)
    {
        $item = $this->itemService->delete($id);
        if($item){
            return response([
                'success' => true,
                'data' => 'Item deleted.'
            ], 200);
        }else{
            return 404;
        }
    }
}
