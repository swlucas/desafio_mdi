<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductFileRequest;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Produto Criado com Sucesso.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Produto Atualizado com Sucesso.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produto Deletado com Sucesso.');
    }

    public function upload(ProductFileRequest $request)
    {

        $xml = XmlParser::load($request->file('file'));
        $productsXml = $xml->getContent();

        $products = [];
        foreach ($productsXml as $prod) {
            $product = new Product;
            $product->code = $prod->codigo;
            $product->name = $prod->nome;
            $product->description = $prod->descricao;
            $product->price = $prod->preco;
            $product->save();
        }
        // return $products;

        return redirect()->route('products.index')
            ->with('success', 'Produto Criado com Sucesso.');
    }
}
