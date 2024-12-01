<!-- Start Products  -->
<div class="products-box">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="title-all text-center">
                <h1>Toko Sayur Berkah</h1>
                <p>Produk Terbaru</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="special-menu text-center">
                <div class="button-group filter-button-group">
                    <button class="active" data-filter="*">Belanja Sekarang</button>
                </div>
            </div>
        </div>

           
<?php foreach ($produk as $produk) { ?>
    <div class="item-slick2 p-l-20 p-r-20">

<?php 
//Form untuk memproses belanjaan
echo form_open(base_url('cart/add')); 
//Elemen yang dibawa
echo form_hidden('id', $produk->id_produk);
echo form_hidden('qty', 1);
echo form_hidden('price', $produk->harga_produk);
echo form_hidden('name', $produk->nama_produk);
//Elemen redirect
echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));
?>

    <div class="products-single fix">
        <div class="type-lb">
            <p class="sale">Terbaru</p>
        </div>
        <img src="<?php echo base_url('assets/freshshop/images/'.$produk->foto_produk) ?>" width="277" height="145" alt="<?php echo $produk->nama_produk ?>">

        <div class="mask-icon">
            <ul>
                <!-- Button detail produk  -->
                <li><a href="<?php echo base_url('produk/detail/'.$produk->id_produk) ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
            </ul>
                <!-- Button Cart  -->
                <button>
                    <a type="submit" value="submit" class="cart">Add to Cart</a>
                </button>
        </div>
    </div>

    <div class="why-text">
        <h4> <?php echo $produk->nama_produk ?></h4>
        <h5>Rp <?php echo number_format($produk->harga_produk, '0',',','.') ?></h5></span>
    </div>

<?php
//Close form
echo form_close();
?>

</div>

<?php } ?>

            </div>
        </div>
    </div>
</div>
</div>
<!-- End Products  -->