<?php

namespace App\Services;


use App\Models\Item;
use App\Resources\ItemCollection;
use App\Resources\ItemResource;
use Illuminate\Support\Facades\App;


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


}
