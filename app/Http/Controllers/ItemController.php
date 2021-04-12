<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Services\ItemService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
    private $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Resources\ItemCollection
     */
    public function index()
    {
        return $this->itemService->index();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $itemService = $this->itemService->show($id);
        return ($itemService) ? $itemService : 'Page Not Found';
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Item
     */
    public function store(Request $request)
    {
        $newItem = new Item;
        $newItem->name = $request->item["name"];
        $newItem->save();

        return $newItem;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return string
     */
    public function update(Request $request, $id)
    {
        $existingItem = Item::find($id);
        if($existingItem){
            $existingItem->completed = $request->item['completed'] ? true : false;
            $existingItem->completed_at = $request->item['completed'] ? Carbon::now() : null;
            $existingItem->save();
            return $existingItem;
        }else{
            return "Item not found.";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return string
     */
    public function destroy($id)
    {
        $existingItem = Item::find($id);
        if($existingItem){
            $existingItem->delete();
            return "Item successfully deleted";
        }else{
            return "Item not found.";
        }

    }
}
