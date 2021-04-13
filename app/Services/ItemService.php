<?php

namespace App\Services;


use App\Models\Item;
use App\Resources\ItemCollection;
use App\Resources\ItemResource;
use Carbon\Carbon;


class ItemService
{
    public function index()
    {
        $items = Item::query()->orderBy('created_at', 'DESC')->get();

        ItemCollection::withoutWrapping();
        if($items){
            return new ItemCollection($items);
        }else{
            return false;
        }
    }

    public function show($id)
    {
        $item = Item::query()->where('id', $id)->first();

        ItemResource::withoutWrapping();
        return ($item) ? new ItemResource($item) : false;
    }

    public function create($request)
    {
        $item = Item::query()->create([
            'name' => $request->name
        ]);
        return ($item) ? $item : false;
    }

    public function update($request, $id): bool
    {
        $item = Item::query()->where('id', $id)->first();

        if($item){
            $item->update([
                'completed' => $request->completed,
                'completed_at' => Carbon::now()
            ]);
            return true;
        }else{
            return false;
        }
    }

    public function delete($id): bool
    {
        $item = Item::query()->find($id);

        if($item){
            $item->delete();
            return true;
        }else{
            return false;
        }
    }

}
