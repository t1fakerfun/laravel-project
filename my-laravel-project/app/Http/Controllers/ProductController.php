<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreUpdateProductRequest;

class ProductController extends Controller
{
    /**
     * 製品一覧を表示
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchword = $request->input('searchword');
        $products = Product::when($searchword,function($q,$k){
            return $q->where('name','like','%'.$k.'%');
        })->paginate(10);
        return view('products.index', compact('products', 'searchword'));
    }
    public function create()
    {
        // OPTIONプルダウン用にカテゴリー一覧を取得しています。
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(StoreUpdateProductRequest $request)
    {
        // Productデータモデルのインスタンスを作成
        $validatedData = $request->validated();

        $product = new Product();
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->category_id = $validatedData['category_id'];
        $product->price = $validatedData['price'];
        $product->save();
        
        // 始めて出てきました。メソッドの終了では、 view() を返して viewを表示
        // する以外に、 redirec() で、別のアクションにリダイレクトをすることも
        // できます。また、その際に、任意のメッセージを表示させる
        // フラッシュメッセージという汎用的な機能があります。これにより
        // 完了メッセージを表示するためだけのページ作成を行う必要がなくなりました。
        // フラッシュメッセージにはデフォルトで、成功・警告・エラーの表示分けがあります。
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }
    public function edit($id)
    {
        // 製品の編集画面を表示
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }
    public function update(StoreUpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        Gate::authorize('update', $product);

        $validatedData = $request->validated();
        $product->name = $request->$validatedData['name'];
        $product->description = $validatedData['description'];
        $product->category_id = $request->$validatedData['category_id'];
        $product->price = $request->$validatedData['price'];
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }
    public function destroy($id)
    {
        // 製品を削除
        $product = Product::findOrFail($id);
        Gate::authorize('delete', $product);
        $product->delete();

        return back()->with('success', 'Product deleted successfully!');
    }
}