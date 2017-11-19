@extends('layouts.app')

@section('content')

<section id="lqt-list-search">
    <div class="lqt-list-search">
        <div class="container">
            <form class="lqt-main-form">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-md-8 col-sm-8 lqt-pr0">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Feeling hungry?">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default lqt-btn-search">Search <span class="glyphicon glyphicon-search"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<section id="lqt-list-content">
    <div class="lqt-list-content">
        <div class="container">
            <br>
            <h1 class="lqt-mb0">Nasi Goreng in Batam</h1>
            <h3 class="lqt-mt0 lqt-fw300">Showing 15 restaurants in Batam</h3>
            <div class="row">
                <div class="lqt-list-wrapper">
                    <div class="col-md-3 col-sm-3 col-xs-12 lqt-list-left">
                        <div class="lqt-list-nav">
                            <h3 class="lqt-m0">Filters</h3>
                            <br>
                            <h4>Popularity</h4>
                            <ul>
                                <li class="active"><a href="#">High to Low</a></li>
                                <li><a href="#">Low to High</a></li>
                            </ul>
                            <br>
                            <h4>Cost</h4>
                            <ul>
                                <li class="active"><a href="#">$</a></li>
                                <li><a href="#">$$</a></li>
                                <li><a href="#">$$$</a></li>
                            </ul>
                            <br>
                            <h4>Cuisine</h4>
                            <ul>
                                <li><a href="#">Indonesian</a></li>
                                <li><a href="#">Chinese Food</a></li>
                                <li><a href="#">Western</a></li>
                                <li><a href="#">Indian</a></li>
                                <li><a href="#">Mexican</a></li>
                            </ul>
                            <br>
                            <h4 class="lqt-fco">Recently Added</h4>
                            <br>
                            <h4>Location</h4>
                            <ul>
                                <li><a href="#">Nagoya</a></li>
                                <li><a href="#">Jodoh</a></li>
                                <li><a href="#">Batu Ampar</a></li>
                                <li><a href="#">Bengkong</a></li>
                                <li><a href="#">Sei Panas</a></li>
                                <li class="active"><a href="#">Batam Center</a></li>
                                <li><a href="#">Batu Besar</a></li>
                                <li><a href="#">Kabil</a></li>
                                <li><a href="#">Muka Kuning</a></li>
                                <li><a href="#">Batu Aji</a></li>
                                <li><a href="#">Sagulung</a></li>
                                <li><a href="#">Sekupang</a></li>
                                <li><a href="#">Tiban</a></li>
                                <li><a href="#">Baloi</a></li>
                            </ul>
                            <br>
                            <h4>Type</h4>
                            <ul>
                                <li class="active"><a href="">Non-Vegetarion</a></li>
                                <li><a href="#">Vegetarian</a></li>
                            </ul>
                            <br>
                            <h4>Payment Type</h4>
                            <ul>
                                <li class="active"><a href="#">Debit Card</a></li>
                                <li><a href="#">Credit Card</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 lqt-list-center">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="lqt-items">
                                    <div class="col-md-4 lqt-p0 lqt-items-img-wrapper">
                                        <img class="" src="img/items.jpg">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="lqt-item-desc">
                                                <div class="col-md-10">
                                                    <h2 class="lqt-m0 lqt-fco">Nasi Goreng Mamang</h2>
                                                    <h3 class="lqt-m0 lqt-fw300">Taman Kota Baloi Blod D1</h3>
                                                    <div class="lqt-line"></div>
                                                    <table>
                                                        <tr>
                                                            <td>Cuisine</td>
                                                            <td>:</td>
                                                            <td>American BBQ</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cost</td>
                                                            <td>:</td>
                                                            <td>$$</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Hours</td>
                                                            <td>:</td>
                                                            <td>8AM - 9PM</td>
                                                        </tr>
                                                    </table>
                                                    <div class="lqt-line"></div>
                                                    <table>
                                                        <tr>
                                                            <td>Contact</td>
                                                            <td>:</td>
                                                            <td>0778 - 435678</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Website</td>
                                                            <td>:</td>
                                                            <td><a href="#">www.kitchenonroad.com</a></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-2 lqt-pl0">
                                                    <div class="lqt-item-rating">4.9<small>/5</small></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="lqt-items">
                                    <div class="col-md-4 lqt-p0 lqt-items-img-wrapper">
                                        <img class="" src="img/items.jpg">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="lqt-item-desc">
                                                <div class="col-md-10">
                                                    <h2 class="lqt-m0 lqt-fco">Nasi Goreng Mamang</h2>
                                                    <h3 class="lqt-m0 lqt-fw300">Taman Kota Baloi Blod D1</h3>
                                                    <div class="lqt-line"></div>
                                                    <table>
                                                        <tr>
                                                            <td>Cuisine</td>
                                                            <td>:</td>
                                                            <td>American BBQ</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cost</td>
                                                            <td>:</td>
                                                            <td>$$</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Hours</td>
                                                            <td>:</td>
                                                            <td>8AM - 9PM</td>
                                                        </tr>
                                                    </table>
                                                    <div class="lqt-line"></div>
                                                    <table>
                                                        <tr>
                                                            <td>Contact</td>
                                                            <td>:</td>
                                                            <td>0778 - 435678</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Website</td>
                                                            <td>:</td>
                                                            <td><a href="#">www.kitchenonroad.com</a></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-2 lqt-pl0">
                                                    <div class="lqt-item-rating">4.9<small>/5</small></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="lqt-items">
                                    <div class="col-md-4 lqt-p0 lqt-items-img-wrapper">
                                        <img class="" src="img/items.jpg">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="lqt-item-desc">
                                                <div class="col-md-10">
                                                    <h2 class="lqt-m0 lqt-fco">Nasi Goreng Mamang</h2>
                                                    <h3 class="lqt-m0 lqt-fw300">Taman Kota Baloi Blod D1</h3>
                                                    <div class="lqt-line"></div>
                                                    <table>
                                                        <tr>
                                                            <td>Cuisine</td>
                                                            <td>:</td>
                                                            <td>American BBQ</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cost</td>
                                                            <td>:</td>
                                                            <td>$$</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Hours</td>
                                                            <td>:</td>
                                                            <td>8AM - 9PM</td>
                                                        </tr>
                                                    </table>
                                                    <div class="lqt-line"></div>
                                                    <table>
                                                        <tr>
                                                            <td>Contact</td>
                                                            <td>:</td>
                                                            <td>0778 - 435678</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Website</td>
                                                            <td>:</td>
                                                            <td><a href="#">www.kitchenonroad.com</a></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-2 lqt-pl0">
                                                    <div class="lqt-item-rating">4.9<small>/5</small></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <ul class="pagination lqt-m0">
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li class="active"><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">6</a></li>
                                    <li><a href="#">7</a></li>
                                    <li><a href="#">8</a></li>
                                    <li><a href="#">9</a></li>
                                </ul>
                                <div class="clearfix"></div>
                                <ul class="pagination lqt-pagination-indicator lqt-mt0">
                                    <li><a href="#"><<</a></li>
                                    <li><a href="#"><</a></li>
                                    <li><a href="#">Page 3 of 9</a></li>
                                    <li><a href="#">></a></li>
                                    <li><a href="#">>></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 lqt-list-right">
                        <h4 class="lqt-mt0">Near You</h4>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <div class="lqt-right-grid">
                                    <img src="img/items.jpg">
                                    <div class="lqt-item-rating">4.9</div>
                                    <p class="lqt-m0"><b><a href="#">ABC Steak House</a></b></p>
                                    <p class="lqt-m0">Nagoya Hill</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <div class="lqt-right-grid">
                                    <img src="img/items.jpg">
                                    <div class="lqt-item-rating">4.9</div>
                                    <p class="lqt-m0"><b><a href="#">ABC Steak House</a></b></p>
                                    <p class="lqt-m0">Nagoya Hill</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <div class="lqt-right-grid">
                                    <img src="img/items.jpg">
                                    <div class="lqt-item-rating">4.9</div>
                                    <p class="lqt-m0"><b><a href="#">ABC Steak House</a></b></p>
                                    <p class="lqt-m0">Nagoya Hill</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <div class="lqt-right-grid">
                                    <img src="img/items.jpg">
                                    <div class="lqt-item-rating">4.9</div>
                                    <p class="lqt-m0"><b><a href="#">ABC Steak House</a></b></p>
                                    <p class="lqt-m0">Nagoya Hill</p>
                                </div>
                            </div>
                        </div>
                        <h4 class="lqt-mt0">Popular This Month</h4>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <div class="lqt-right-grid">
                                    <img src="img/items.jpg">
                                    <div class="lqt-item-rating">4.9</div>
                                    <p class="lqt-m0"><b><a href="#">ABC Steak House</a></b></p>
                                    <p class="lqt-m0">Nagoya Hill</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <div class="lqt-right-grid">
                                    <img src="img/items.jpg">
                                    <div class="lqt-item-rating">4.9</div>
                                    <p class="lqt-m0"><b><a href="#">ABC Steak House</a></b></p>
                                    <p class="lqt-m0">Nagoya Hill</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <div class="lqt-right-grid">
                                    <img src="img/items.jpg">
                                    <div class="lqt-item-rating">4.9</div>
                                    <p class="lqt-m0"><b><a href="#">ABC Steak House</a></b></p>
                                    <p class="lqt-m0">Nagoya Hill</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <div class="lqt-right-grid">
                                    <img src="img/items.jpg">
                                    <div class="lqt-item-rating">4.9</div>
                                    <p class="lqt-m0"><b><a href="#">ABC Steak House</a></b></p>
                                    <p class="lqt-m0">Nagoya Hill</p>
                                </div>
                            </div>
                        </div>
                        <h4 class="lqt-mt0">Interesting Article</h4>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <div class="lqt-right-grid lqt-articel">
                                    <img src="img/items.jpg">
                                    <div class="lqt-item-rating">4.9</div>
                                    <p class="lqt-m0"><b><a href="#">Makan terlalu banyak bisa menyebabkan kegemukan</a></b></p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <div class="lqt-right-grid lqt-articel">
                                    <img src="img/items.jpg">
                                    <div class="lqt-item-rating">4.9</div>
                                    <p class="lqt-m0"><b><a href="#">Makan terlalu banyak bisa menyebabkan kegemukan</a></b></p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <div class="lqt-right-grid lqt-articel">
                                    <img src="img/items.jpg">
                                    <div class="lqt-item-rating">4.9</div>
                                    <p class="lqt-m0"><b><a href="#">Makan terlalu banyak bisa menyebabkan kegemukan</a></b></p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <div class="lqt-right-grid lqt-articel">
                                    <img src="img/items.jpg">
                                    <div class="lqt-item-rating">4.9</div>
                                    <p class="lqt-m0"><b><a href="#">Makan terlalu banyak bisa menyebabkan kegemukan</a></b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection