<!-- Start All Title Box -->
<section>
    
<div class="all-title-box">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Shop</h2>
        </div>
    </div>
</div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Page  -->
<div class="row">
    <?php foreach($produk as $produk) { ?>

    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
        <div class="products-single fix">
            <div class="box-img-hover">
                <div class="type-lb">
                    <p class="new">New</p>
                </div>
                <img src="<?php echo base_url('assets/freshshop/images/'.$produk->foto_produk) ?>" alt="<?php echo $produk->nama_produk ?>">
                <div class="mask-icon">
                    <ul>
                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                    </ul>
                    <a class="cart" href="#">Add to Cart</a>
                </div>
            </div>
            <div class="why-text">
                <h4>Lorem ipsum dolor sit amet</h4>
                <h5> $9.79</h5>
            </div>
        </div>
    </div>
<!-- -->
<?php } ?>
</div>

<!-- pagination -->
<div class="pagination flex-m flex-w p-t-26">
    <?php echo $paging; ?>
    
        <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
            <div class="product-categori">
                <div class="search-product">
                    <form action="#">
                        <input class="form-control" placeholder="Search here..." type="text">
                        <button type="submit"> <i class="fa fa-search"></i> </button>
                    </form>
                </div>
                <div class="filter-price-left">
                    <div class="title-left">
                        <h3>Price</h3>
                    </div>
                    <div class="price-box-slider">
                        <div id="slider-range"></div>
                        <p>
                            <input type="text" id="amount" readonly style="border:0; color:#fbb714; font-weight:bold;">
                            <button class="btn hvr-hover" type="submit">Filter</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Shop Page -->