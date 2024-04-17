<?php

namespace App\Http\Controllers;

use App\catalogProducts;
use App\Http\Requests\ProductsRequest;
use App\Http\Requests\ProductsUpdateRequest;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = catalogProducts::all();
        return response()->json($products);
    }

   
    public function store(ProductsRequest $request)
    {
        try {
        
            $products= new catalogProducts();
            $products->name= $request->name;
            $products->description= $request->description;
            $products->height = $request->height;
            $products->length = $request->length;
            $products->width = $request->width;
        
            if($products->save()){
                return response()->json([
                    'status' => true,
                    'message' => 'Registro de Producto realizado correctamente'
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Error al realizar el registro del producto'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => _($e->getMessage())
            ]);
        }
    }

    
    
   
    public function update(ProductsUpdateRequest $request, $id)
    {
        try {
            
            //Validando que no se encuente registrado el nombre en otro producto
            $existeNombre=catalogProducts::where('id', '!=' , $id)->where('name',$request->name)->first();
            if($existeNombre!=""){
                return response()->json([
                    'status' => false,
                    'message' => 'El Nombre '.$request->name.' ya se encuentra registrado'
                ]);
            }
           
            //Actualizando datos del producto
            $products = catalogProducts::where('id',$id)->first();
            $products->name= $request->name;
            $products->description= $request->description;
            $products->height = $request->height;
            $products->length = $request->length;
            $products->width = $request->width;
            if($products->update()){
                return response()->json([
                    'status' => true,
                    'message' => 'Producto actualizado correctamente'
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Error al actualizar el producto'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    
    public function destroy($id)
    {
       try {
        $products = catalogProducts::where('id',$id)->first();
        
        if($products!="" && $products->delete()){
            return response()->json([
                'status' => true,
                'message' => 'Producto eliminado con éxito.'
            ]);
        }else{
            return response()->json([
                'status' => true,
                'message' => 'Error al eliminar el producto.'
            ]);
        }
       } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);  
       } 
    }
}
