<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Products extends BaseController
{
    private $productId;
    private $productsModel;
    private $productDiscountsModel;
    private $productImagesModel;
    private $productLangsModel;
    private $languages;

    public function __construct()
    {
        $this->productsModel = new \App\Models\Products();
        $this->productDiscountsModel = new \App\Models\ProductDiscounts();
        $this->productImagesModel = new \App\Models\ProductImages();
        $this->productLangsModel = new \App\Models\ProductLangs();
        $this->languages = [
            'tr' => 'Türkçe',
            'en' => 'İngilizce',
        ];
    }

    public function index()
    {
        $products = $this->productsModel->getProducts();
        return view('admin/products/index', ["products" => $products]);
    }
    public function create()
    {
        return view('admin/products/create', [
            'languages' => $this->languages
        ]);
    }

    public function edit($id)
    {
        $product = $this->productsModel->getProduct($id);
        if($product) {
            $product_langs = $this->productLangsModel->getProductLang($id);
            $product_images = $this->productImagesModel->getProductImages($id);
            $product_discounts = $this->productDiscountsModel->getProductDiscounts($id);

            $new_product_langs = [];
            foreach ($product_langs as $key => $val) {
                if(in_array($val->lang, array_keys($this->languages))) {
                    $new_product_langs[$val->lang] = $val;
                }
            }

            $data = [
                'languages' => $this->languages,
                "product" => $product[0],
                "product_langs" => $new_product_langs,
                "product_images" => $product_images,
                "product_discounts" => $product_discounts,
            ];
            return view('admin/products/edit', $data);

        }
        return redirect('admin_products');
    }

    public function store()
    {
        helper(['form', 'url']);

        $request = $this->request->getPost();

        if (! $this->validate([
            'langs.tr.title' => ['label' => 'Türkçe Ürün Başlık', 'rules' => 'required',],
            'product_code' => ['label' => 'Ürün Kodu', 'rules' => 'required',],
            'quantity' => ['label' => 'Miktar', 'rules' => 'required',],
            'basket_discount' => ['label' => 'Sepet Extra İndirim', 'rules' => 'required',],
            'kdv' => ['label' => 'Vergi Oranı', 'rules' => 'required',],
            'tl_price' => ['label' => 'Satış Fiyatı', 'rules' => 'required',],
            'second_price' => ['label' => '2. Satış Fiyatı', 'rules' => 'required',],
            'out_of_stock' => ['label' => 'Stoktan Düş', 'rules' => 'required',],
            'status' => ['label' => 'Durum', 'rules' => 'required',],
            'property_show' => ['label' => 'Özellik Bölümü', 'rules' => 'required',],
            'product_end_date' => ['label' => 'Yeni Ürün Geçerlilik Süresi', 'rules' => 'required',],
            'order' => ['label' => 'Sıralama', 'rules' => 'required',],
            'show_on_homepage' => ['label' => 'Anasayfada Göster', 'rules' => 'required',],
            'new_product' => ['label' => 'Yeni Ürün', 'rules' => 'required',],
            'installment' => ['label' => 'Taksit', 'rules' => 'required',],
            'warranty_period' => ['label' => 'Garanti Süresi', 'rules' => 'required',],
        ]))
        {
            return view('admin/products/create', [
                'languages' => $this->languages,
                'validation' => $this->validator,
                'request' => $request
            ]);
        } else {

            try {

                $img = $this->request->getFile('image_url');
                $path = 'public/uploads';
                $img->move(ROOTPATH . $path);
                $request["image_url"] = $img->getName();

                $this->productId = $this->productsModel->insert($request);
                $errors = $this->productsModel->errors();
                if($errors) {
                    return $this->response->setJSON(["errors" => $errors]);
                }

                foreach ($request["langs"] as $lang => $data) {
                    $data["product_id"] = $this->productId;
                    $this->productLangsModel->insert($data);
                    $errors = $this->productLangsModel->errors();
                    if($errors) {
                        return $this->response->setJSON(["errors" => $errors]);
                    }
                }

                foreach ($request["discounts"] as $key => $data) {
                    $data["product_id"] = $this->productId;
                    $this->productDiscountsModel->insert($data);
                    $errors = $this->productDiscountsModel->errors();
                    if($errors) {
                        return $this->response->setJSON(["errors" => $errors]);
                    }
                }

                if ($images = $this->request->getFiles()) {
                    foreach($images['images'] as $img) {

                        $path = 'public/uploads';
                        $img->move(ROOTPATH . $path);

                        $data["product_id"] = $this->productId;
                        $data["image_url"] = $img->getName();

                        $this->productImagesModel->insert($data);
                        $errors = $this->productImagesModel->errors();
                        if($errors) {
                            return $this->response->setJSON(["errors" => $errors]);
                        }
                    }
                }
            }
            catch(\Exception $exception)
            {
                return $this->response->setJSON(["errors" => $exception->getMessage()]);
            }

        }

        return redirect('admin_products');
    }

    public function delete($id)
    {
        try {
            $deleteProduct = $this->productsModel->deleteProduct($id);
            if($deleteProduct) {
                return redirect('admin_products');
            }
        }
        catch(\Exception $exception)
        {
            return $this->response->setJSON(["errors" => $exception->getMessage()]);
        }
    }
}