<?php

namespace  App\Repositories;

use App\Models\Product;

class ProductRepository {
    protected $model;

    public function __construct(Product $product) {
        $this->model = $product;
    }

    /**
     * Obtenemos la lista de productos
    */ 
    public function getAll() : array{
        return $this->model->get()->toArray();
    }

    /**
     * Obtenemos un product, por ID
     * @return ?Product 
    */

    public function getById(int $id) : ?Product{
        return $this->model->findOrFail($id);
    }

    /**
     * Crear Producto
     * @return ?Product
    */
    public function create($data) : ?Product {
        return $this->model->create($data);
    }

    /**
     * Actualizar product
     * @return ?Product
    */

    public function update($id, $data) : ?Product {
        $product = $this->getById(intval($id));
        $product->update($data);

        return $product;
    } 
    
    /**
     * Eliminar Producto
     * @return ?Product 
    */
    
    public function delete($id) : ?Product {
        $product = $this->getById(intval($id));
        $product->delete();

        return $product;
    }
}

