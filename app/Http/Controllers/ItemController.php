<?php

namespace App\Http\Controllers;

use App\DataTables\ItemDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Icategoria;
use App\Models\Item;
use App\Models\Unimed;
use App\Repositories\ItemRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ItemController extends AppBaseController
{
    /** @var  ItemRepository */
    private $itemRepository;

    public function __construct(ItemRepository $itemRepo)
    {
        $this->middleware("auth");
        $this->itemRepository = $itemRepo;
    }

    /**
     * Display a listing of the Item.
     *
     * @param ItemDataTable $itemDataTable
     * @return Response
     */
    public function index(ItemDataTable $itemDataTable)
    {
        return $itemDataTable->render('items.index');
    }

    /**
     * Show the form for creating a new Item.
     *
     * @return Response
     */
    public function create()
    {
        $unimeds= array_pluck(Unimed::all()->toArray(),"nombre","id");
        $cats= Icategoria::all();
        $catsItem= [];


//        dd($unimeds);
        return view('items.create',compact('unimeds','cats','catsItem'));
    }

    /**
     * Store a newly created Item in storage.
     *
     * @param CreateItemRequest $request
     *
     * @return Response
     */
    public function store(CreateItemRequest $request)
    {

        $fields = [
            'nombre'=> $request->nombre,
            'descripcion'=> $request->descripcion,
            'precio' => $request->precio,
            'codigo' => $request->codigo,
            'unimed_id' => $request->unimed_id,
            'iestado_id' => 1
        ];

        $item=Item::create($fields);


        if($request->categorias){

            $item->icategorias()->sync($request->categorias);
        }


        if ($request->hasFile('imagen')) {
            $file= $request->file('imagen');

            $nameImg= $item->id.'.'.$file->extension();

            $item->imagen = 'img/items/'.$nameImg;
            $item->save();

            $file->move(public_path().'/img/items/',$nameImg);
        }

        Flash::success('Item saved successfully.');

        return redirect(route('items.index'));
    }

    /**
     * Display the specified Item.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $item = $this->itemRepository->findWithoutFail($id);

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        return view('items.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified Item.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $item = $this->itemRepository->findWithoutFail($id);

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }else{
            $unimeds= array_pluck(Unimed::all()->toArray(),"nombre","id");
            $cats= Icategoria::all();
            $catsItem= array_pluck($item->icategorias->toArray(),"id");

//            dd($catsItem);
            return view('items.edit',compact('item','unimeds','cats','catsItem'));
        }

    }

    /**
     * Update the specified Item in storage.
     *
     * @param  int              $id
     * @param UpdateItemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateItemRequest $request)
    {
        $item = $this->itemRepository->findWithoutFail($id);

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }else{

            $fields = [
                'nombre'=> $request->nombre,
                'descripcion'=> $request->descripcion,
                'precio' => $request->precio,
                'codigo' => $request->codigo,
                'unimed_id' => $request->unimed_id
            ];

            if ($request->hasFile('imagen')) {
                $file= $request->file('imagen');

                $nameImg= $item->id.'.'.$file->extension();

                $fields['imagen']= 'img/items/'.$nameImg;

                $file->move(public_path().'/img/items/',$nameImg);
            }

            $item->fill($fields);
            $item->save();

            if($request->categorias){

                $item->icategorias()->sync($request->categorias);
            }



            Flash::success('Item updated successfully.');

            return redirect(route('items.index'));
        }

    }

    /**
     * Remove the specified Item from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $item = $this->itemRepository->findWithoutFail($id);

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        $this->itemRepository->delete($id);

        Flash::success('Item deleted successfully.');

        return redirect(route('items.index'));
    }
}
