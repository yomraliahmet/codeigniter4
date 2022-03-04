<?php echo $this->extend('admin/layouts/main'); ?>
<?php echo $this->section('content'); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Product Edit - ID: <?php echo $product["id"]; ?></h1>

        <div class="btn-toolbar mb-2 mb-md-0">
            <button form="product-create" type="submit" class="btn btn-sm btn-success m-1">
                <span data-feather="save"></span>
                Save
            </button>
            <a href="<?php echo route_to('admin_products_products') ?>" class="btn btn-sm btn-danger m-1">
                <span data-feather="x-circle"></span>
                Cancel
            </a>
        </div>
    </div>
    <?php
    if(isset($validation)) {
        echo '<div class="m-1 text-danger">'.  $validation->listErrors() .'</div>';
    }
    ?>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-genel-tab" data-bs-toggle="tab" data-bs-target="#nav-genel" type="button" role="tab" aria-controls="nav-genel" aria-selected="true">Genel</button>
            <button class="nav-link" id="nav-detaylar-tab" data-bs-toggle="tab" data-bs-target="#nav-detaylar" type="button" role="tab" aria-controls="nav-detaylar" aria-selected="false">Detaylar</button>
            <button class="nav-link" id="nav-resimler-tab" data-bs-toggle="tab" data-bs-target="#nav-resimler" type="button" role="tab" aria-controls="nav-resimler" aria-selected="false">Resimler</button>
            <button class="nav-link" id="nav-indirim-tab" data-bs-toggle="tab" data-bs-target="#nav-indirim" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">İndirim</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <form id="product-create" method="post" action="<?php echo route_to('admin_products_store') ?>" enctype="multipart/form-data"></form>
        <div class="tab-pane fade p-3 show active" id="nav-genel" role="tabpanel" aria-labelledby="nav-genel-tab">
            <nav>
                <div class="nav nav-tabs" id="nav-tab-2" role="tablist">
                <?php foreach ($languages as $key => $val): ?>
                    <button class="nav-link <?php echo $key == 'tr' ? 'active' : ''; ?>" id="nav-<?php echo $key; ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php echo $key; ?>" type="button" role="tab" aria-controls="nav-<?php echo $key; ?>" aria-selected="true"><?php echo $val; ?></button>
                <?php endforeach; ?>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <?php foreach ($languages as $key1 => $val1): ?>

                    <div class="tab-pane p-3 fade <?php echo $key1 == 'tr' ? 'show active' : ''; ?>" id="nav-<?php echo $key1; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $key1; ?>-tab">

                        <input form="product-create" type="hidden" name="langs[<?php echo $key1; ?>][lang]" value="<?php echo @$key1;?>">
                        <div class="mb-3 row">
                            <label for="title" class="col-sm-3 col-form-label">
                                <span class="text-danger text-bold">*</span> <?php echo $val1; ?> Ürün Başlık
                            </label>
                            <div class="col-sm-4">
                                <input form="product-create" value="<?php echo @$product_langs[$key1]->title;?>" type="text" id="title" name="langs[<?php echo $key1; ?>][title]" class="form-control" aria-describedby="title">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="info_title" class="col-sm-3 col-form-label">
                                <?php echo $val1; ?> Ürün Ek Bilgi Başlığı
                            </label>
                            <div class="col-sm-4">
                                <input form="product-create" type="text" id="info_title" value="<?php echo @$product_langs[$key1]->info_title;?>" name="langs[<?php echo $key1; ?>][info_title]" class="form-control" aria-describedby="info_title">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="info_description" class="col-sm-3 col-form-label">
                                <?php echo $val1; ?> Ürün Ek Bilgi Açıklaması
                            </label>
                            <div class="col-sm-4">
                                <input form="product-create" type="text" id="info_description" value="<?php echo @$product_langs[$key1]->info_description;?>" name="langs[<?php echo $key1; ?>][info_description]" class="form-control" aria-describedby="info_description">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="meta_title" class="col-sm-3 col-form-label">
                                <?php echo $val1; ?> Meta Title
                            </label>
                            <div class="col-sm-4">
                                <input form="product-create" type="text" id="meta_title" value="<?php echo @$product_langs[$key1]->meta_title;?>" name="langs[<?php echo $key1; ?>][meta_title]" class="form-control" aria-describedby="meta_title">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="meta_keywords" class="col-sm-3 col-form-label">
                                <?php echo $val1; ?> Meta Keywords
                            </label>
                            <div class="col-sm-4">
                                <input form="product-create" type="text" id="meta_keywords" value="<?php echo @$product_langs[$key1]->meta_keywords;?>" name="langs[<?php echo $key1; ?>][meta_keywords]" class="form-control" aria-describedby="meta_keywords">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="meta_description" class="col-sm-3 col-form-label">
                                <?php echo $val1; ?> Meta Description
                            </label>
                            <div class="col-sm-4">
                                <input form="product-create" type="text" id="meta_description" value="<?php echo @$product_langs[$key1]->meta_description;?>" name="langs[<?php echo $key1; ?>][meta_description]" class="form-control" aria-describedby="meta_description">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="slug" class="col-sm-3 col-form-label">
                                <?php echo $val1; ?> Seo Adresi
                            </label>
                            <div class="col-sm-4">
                                <input form="product-create" type="text" id="slug" value="<?php echo @$product_langs[$key1]->slug;?>" name="langs[<?php echo $key1; ?>][slug]" class="form-control" aria-describedby="slug">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="content" class="col-sm-3 col-form-label">
                                <?php echo $val1; ?> Ürün Açıklama
                            </label>
                            <div class="col-sm-9">
                                <textarea form="product-create" name="langs[<?php echo $key1; ?>][content]" id="content" cols="90%" rows="6"  class="form-control"><?php echo @$product_langs[$key1]->content;?></textarea>
                                <script>
                                    CKEDITOR.replace( 'langs[<?php echo $key1; ?>][content]', {
                                        'entities_latin' : false,
                                    });
                                </script>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="video_embed_code" class="col-sm-3 col-form-label">
                                <?php echo $val1; ?> Video Embed Kodu
                            </label>
                            <div class="col-sm-6">
                                <textarea form="product-create" name="langs[<?php echo $key1; ?>][video_embed_code]" id="video_embed_code" cols="90%" rows="4"  class="form-control"><?php echo @$product_langs[$key1]->video_embed_code;?></textarea>
                            </div>
                        </div>


                    </div>
                <?php endforeach; ?>

            </div>
        </div>
        <div class="tab-pane p-3 fade" id="nav-detaylar" role="tabpanel" aria-labelledby="nav-detaylar-tab">

            <div class="mb-3 row">
                <label for="product_code" class="col-sm-3 col-form-label">
                    <span class="text-danger text-bold">*</span> Ürün Kodu
                </label>
                <div class="col-sm-4">
                    <input form="product-create" type="text" id="product_code" value="<?php echo @$product["product_code"];?>" name="product_code" class="form-control" aria-describedby="prodcut_code">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="quantity" class="col-sm-3 col-form-label">
                    <span class="text-danger text-bold">*</span> Miktar
                </label>
                <div class="col-sm-4">
                    <input form="product-create" type="text" id="quantity" value="<?php echo @$product["quantity"];?>" name="quantity" class="form-control" aria-describedby="quantity">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="basket_discount" class="col-sm-3 col-form-label">
                    <span class="text-danger text-bold">*</span> Sepet Ekstra İndirim %
                </label>
                <div class="col-sm-4">
                    <select form="product-create" id="basket_discount" name="basket_discount" class="form-select" aria-describedby="basket_discount">
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>
                    <script>document.getElementById("basket_discount").value = <?php echo @$product["basket_discount"];?>;</script>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="kdv" class="col-sm-3 col-form-label">
                    <span class="text-danger text-bold">*</span> Vergi Oranı %
                </label>
                <div class="col-sm-4">
                    <select form="product-create" id="kdv" name="kdv" class="form-select" aria-describedby="kdv">
                        <option value="18">18</option>
                        <option value="8">8</option>
                    </select>
                    <script>document.getElementById("kdv").value = <?php echo @$product["kdv"];?>;</script>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="price" class="col-sm-3 col-form-label">
                    <span class="text-danger text-bold">*</span> Satış Fiyatı
                </label>
                <div class="col-sm-4">
                    <div class="input-group mb-3">
                        <input form="product-create" type="text" id="tl_price" value="<?php echo @$product["tl_price"];?>" name="tl_price" class="form-control" aria-describedby="tl_price">
                        <span class="input-group-text" id="tl_price">₺</span>
                    </div>

                    <div class="input-group mb-3">
                        <input form="product-create" type="text" id="dollar_price" value="<?php echo @$product["dollar_price"];?>" name="dollar_price" class="form-control" aria-describedby="dollar_price">
                        <span class="input-group-text" id="dollar_price">$</span>
                    </div>

                    <div class="input-group mb-3">
                        <input form="product-create" type="text" id="euro_price" value="<?php echo @$product["euro_price"];?>" name="euro_price" class="form-control" aria-describedby="euro_price">
                        <span class="input-group-text" id="euro_price">€</span>
                    </div>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="second_price" class="col-sm-3 col-form-label">
                    <span class="text-danger text-bold">*</span> 2. Satış Fiyatı
                </label>
                <div class="col-sm-4">
                    <div class="input-group mb-3">
                        <input form="product-create" type="text" id="second_price" value="<?php echo @$product["second_price"];?>" name="second_price" class="form-control" aria-describedby="second_price">
                        <span class="input-group-text" id="second_price">₺</span>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="out_of_stock" class="col-sm-3 col-form-label">
                    <span class="text-danger text-bold">*</span> Stoktan Düş
                </label>
                <div class="col-sm-4">
                    <select form="product-create" id="out_of_stock"  name="out_of_stock" class="form-select" aria-describedby="out_of_stock">
                        <option value="1">Evet</option>
                        <option value="0">Hayır</option>
                    </select>
                    <script>document.getElementById("out_of_stock").value = <?php echo @$product["out_of_stock"];?>;</script>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="status" class="col-sm-3 col-form-label">
                    <span class="text-danger text-bold">*</span> Durum
                </label>
                <div class="col-sm-4">
                    <select form="product-create" id="status" name="status" class="form-select" aria-describedby="status">
                        <option value="1">Açık</option>
                        <option value="0">Kapalı</option>
                    </select>
                    <script>document.getElementById("status").value = <?php echo @$product["status"];?>;</script>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="property_show" class="col-sm-3 col-form-label">
                    <span class="text-danger text-bold">*</span> Özellik Bölümü
                </label>
                <div class="col-sm-4">
                    <select form="product-create" id="property_show" name="property_show" class="form-select" aria-describedby="property_show">
                        <option value="1">Göster</option>
                        <option value="0">Gizle</option>
                    </select>
                    <script>document.getElementById("property_show").value = <?php echo @$product["property_show"];?>;</script>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="product_end_date" class="col-sm-3 col-form-label">
                    <span class="text-danger text-bold">*</span> Yeni Ürün Geçerlilik Süresi
                </label>
                <div class="col-sm-4">
                    <input form="product-create"  type="date" id="product_end_date" value="<?php echo @$product["product_end_date"];?>" name="product_end_date" class="form-control" aria-describedby="product_end_date">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="order" class="col-sm-3 col-form-label">
                    <span class="text-danger text-bold">*</span> Sıralama
                </label>
                <div class="col-sm-4">
                    <input form="product-create" value="<?php echo @$product["order"] ?? 0;?>" type="text" id="order" name="order" class="form-control" aria-describedby="order">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="show_on_homepage" class="col-sm-3 col-form-label">
                    <span class="text-danger text-bold">*</span> Anasayfada Göster
                </label>
                <div class="col-sm-4">
                    <input form="product-create" value="<?php echo @$product["show_on_homepage"] ?? 0;?>" type="text" id="show_on_homepage" name="show_on_homepage" class="form-control" aria-describedby="show_on_homepage">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="new_product" class="col-sm-3 col-form-label">
                    <span class="text-danger text-bold">*</span> Yeni ürün
                </label>
                <div class="col-sm-4">
                    <select form="product-create" id="new_product" name="new_product" class="form-select" aria-describedby="new_product">
                        <option value="1">Evet</option>
                        <option value="0">Hayır</option>
                    </select>
                    <script>document.getElementById("new_product").value = <?php echo @$product["new_product"];?>;</script>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="installment" class="col-sm-3 col-form-label">
                    <span class="text-danger text-bold">*</span> Taksit
                </label>
                <div class="col-sm-4">
                    <select form="product-create" id="installment" name="installment" class="form-select" aria-describedby="installment">
                        <option value="1">Evet</option>
                        <option value="0">Hayır</option>
                    </select>
                    <script>document.getElementById("installment").value = <?php echo @$product["installment"];?>;</script>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="warranty_period" class="col-sm-3 col-form-label">
                    <span class="text-danger text-bold">*</span> Garanti Süresi
                </label>
                <div class="col-sm-4">
                    <input form="product-create" value="<?php echo @$product["warranty_period"];?>" type="text" id="warranty_period" name="warranty_period" class="form-control" aria-describedby="warranty_period">
                </div>
            </div>

        </div>
        <div class="tab-pane p-3 fade" id="nav-resimler" role="tabpanel" aria-labelledby="nav-resimler-tab">

            <div class="mb-3">
                <label for="image_url" class="form-label">Ürün Ana Resmi</label>
                <input form="product-create" class="form-control" type="file" id="image_url" name="image_url">
            </div>

            <br>
            <h5>Resimler</h5>
            <hr>
            <div id="images">

            </div>

            <button class="btn btn-sm btn-success" onclick="addFileInput();">Resim Ekle</button>
        </div>
        <div class="tab-pane p-3 fade" id="nav-indirim" role="tabpanel" aria-labelledby="nav-indirim-tab">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Müşteri Grubu</th>
                    <th scope="col">Öncelik</th>
                    <th scope="col">Yüzde İndirim Oranı veya İndirimli Fiyatı</th>
                    <th scope="col">Başlangıç Tarihi</th>
                    <th scope="col">Bitiş Tarihi</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody id="discount" class="display:flex; justify-content:center">

                </tbody>
            </table>

            <button class="btn btn-sm btn-success" onclick="addDiscount();">İndirim Ekle</button>
            <script>

                function tBody(index) {
                    return `
                     <tr>
                    <td class="align-middle">
                        <select  form="product-create" name="discounts[`+index+`][customer_group]" id="customer_group" class="form-control">
                            <option value="customer">Müşteri</option>
                            <option value="seller">Bayi</option>
                        </select>
                    </td>
                    <td class="align-middle">
                        <input type="text" form="product-create" name="discounts[`+index+`][priority]" class="form-control">
                    </td>
                    <td class="align-middle">

                        <div class="input-group mb-3">
                            <input form="product-create" type="text" id="discounts[tl_price]" name="discounts[`+index+`][tl_price]" class="form-control" aria-describedby="discounts[tl_price]">
                            <span class="input-group-text" id="discounts[tl_price]">₺</span>

                            <select  form="product-create" name="discounts[`+index+`][tl_price_type]" id="discounts[tl_price_type]" class="form-select">
                                <option value="price">Fiyat</option>
                                <option value="rate">Oran</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <input form="product-create" type="text" id="discounts[dollar_price]" name="discounts[`+index+`][dollar_price]" class="form-control" aria-describedby="discounts[dollar_price]">
                            <span class="input-group-text" id="discounts[dollar_price]">$</span>

                            <select  form="product-create" name="discounts[`+index+`][dollar_price_type]" id="discounts[dollar_price_type]" class="form-select">
                                <option value="price">Fiyat</option>
                                <option value="rate">Oran</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <input form="product-create" type="text" id="discounts[euro_price]" name="discounts[`+index+`][euro_price]" class="form-control" aria-describedby="discounts[euro_price]">
                            <span class="input-group-text" id="discounts[euro_price]">€</span>

                            <select  form="product-create" name="discounts[`+index+`][euro_price_type]" id="discounts[euro_price_type]" class="form-select">
                                <option value="price">Fiyat</option>
                                <option value="rate">Oran</option>
                            </select>
                        </div>

                    </td>
                    <td class="align-middle">
                        <input type="date" form="product-create"  class="form-control" name="discounts[`+index+`][start_date]">
                    </td>
                    <td class="align-middle">
                        <input type="date" form="product-create" class="form-control" name="discounts[`+index+`][end_date]">
                    </td>
                    <td class="align-middle">
                        <button class="btn btn-sm btn-danger" onclick="this.closest('tr').remove();">Kaldır</button>
                    </td>
                </tr>
                    `;
                }

                document.querySelector('#discount').innerHTML += tBody(0);

                function addDiscount() {
                    var tbody = document.getElementById('discount');
                    var index = (tbody.getElementsByTagName('tr').length - 1) + 1;
                    document.querySelector('#discount').innerHTML += tBody(index);
                }

                function addFileInput() {
                    var index = document.querySelectorAll('.fileElement').length + 1
                    document.getElementById('images').innerHTML += `
                   <div class="mb-3 fileElement">
                        <label for="image_url" class="form-label">Resim `+ index +`</label>
                        <div class="input-group mb-3">
                            <input form="product-create" class="form-control" type="file" id="images[]" name="images[]">
                            <button class="btn btn-danger" onclick="this.closest('.fileElement').remove();">Sil</button>
                        </div>
                    </div>
                    `;
                }

            </script>

        </div>
    </div>

</main>
<?php echo $this->endSection(); ?>




