<?php
ob_start();
include("Head.php");
?>

  <section class="text-white">
    <div class="slideshow slide-in" style="height: 100vh;">
      <div class="swiper-wrapper">
        <div class="swiper-slide d-flex align-items-center"
          style="background-image:url(../Assets/Templates/Main/images/banner-large-image.png);">
          <div class="banner-content w-100">
            <div class="container ">
              <div class="row ">
                <div class="col-md-8 offset-md-2 text-center">
                  <h2 class="section-title text-uppercase display-2 mt-5 ">glowKare</h2>
                  <p class="caption opacity-75">“Experience the magic of glowKare – where every drop reveals your skin’s true radiance.”</p>
                  <div class="btn-left btn-swiper">
                    <a href="SearchProduct.php" class="btn btn-light text-white bg-transparent text-uppercase mt-3">Shop Collection</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide d-flex align-items-center"
          style="background-image:url(../Assets/Templates/Main/images/banner-large-image1.png);">
          <div class="banner-content w-100">
            <div class="container ">
              <div class="row ">
                <div class="col-md-8 offset-md-2 text-center ">
                  <h2 class="section-title text-uppercase display-2 mt-5">Summer Glow</h2>
                  <p class="caption opacity-75">Tortor eget placerat arcu integer. Lectus fames egestas tincidunt
                    aliquet vivamus nibh lorem nulla. This is Modern fashion ectus fames egestas tincidunt aliquet
                    vivamus nibh lorem nulla.</p>
                  <div class="btn-left btn-swiper">
                    <a href="#" class="btn btn-light text-white bg-transparent text-uppercase mt-3">Shop Collection</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide d-flex align-items-center"
          style="background-image:url(../Assets/Templates/Main/images/banner-large-image2.jpg);">
          <div class="banner-content w-100">
            <div class="container ">
              <div class="row ">
                <div class="col-md-8 offset-md-2 text-center ">
                  <h2 class="section-title text-uppercase display-2 mt-5">Summer Glow</h2>
                  <p class="caption opacity-75">Tortor eget placerat arcu integer. Lectus fames egestas tincidunt
                    aliquet vivamus nibh lorem nulla. This is Modern fashion ectus fames egestas tincidunt aliquet
                    vivamus nibh lorem nulla.</p>
                  <div class="btn-left btn-swiper">
                    <a href="#" class="btn btn-light text-white bg-transparent text-uppercase mt-3">Shop Collection</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination swiper-pagination-slideshow "></div>

      <!-- <i class="icon-arrow  light-arrow icon-arrow-left"></i>
      <i class="icon-arrow  light-arrow icon-arrow-right"></i> -->
    </div>
  </section>

  <section class="features py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="0">
          <div class="py-5">
            <svg width="38" height="38" viewBox="0 0 24 24" class="svg-color">
              <use xlink:href="#calendar"></use>
            </svg>
            <h4 class="element-title text-capitalize my-3">Book An Appointment</h4>
            <p>"Glow your way to beauty—book your appointment today!"</p>
          </div>
        </div>
        <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="300">
          <div class="py-5">
            <svg width="38" height="38" viewBox="0 0 24 24" class="svg-color">
              <use xlink:href="#shopping-bag"></use>
            </svg>
            <h4 class="element-title text-capitalize my-3">Pick up in store</h4>
            <p>"Shop online, pick up in-store—your glow is just a visit away!"</p>
          </div>
        </div>
        <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="600">
          <div class="py-5">
            <svg width="38" height="38" viewBox="0 0 24 24" class="svg-color">
              <use xlink:href="#gift"></use>
            </svg>
            <h4 class="element-title text-capitalize my-3">Special packaging</h4>
            <p>"Unwrap the magic of skincare with our special packaging!"</p>
          </div>
        </div>
        <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="900">
          <div class="py-5">
            <svg width="38" height="38" viewBox="0 0 24 24" class="svg-color">
              <use xlink:href="#arrow-cycle"></use>
            </svg>
            <h4 class="element-title text-capitalize my-3">Sorry! No returns</h4>
            <p>"Final sale, no returns—choose your glow wisely!"</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  

  <section class="categories full-width-container overflow-hidden">
    <div class="row d-flex flex-wrap g-0">
      <div class="col-md-6 col-sm-6">
        <div class="cat-item position-relative">
          <div class="image-holder">
            <a href="#"><img src="../Assets/Templates/Main/images/cat-large-item1.jpg" alt="categories"
                class="product-image img-fluid"></a>
            <div class="category-content position-absolute p-md-5 ps-5 p-3 text-uppercase  ">
              <h2 class="section-title text-white display-3">Skin Care</h2>
              
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="">
          <div class="cat-item position-relative">
            <div class="image-holder">
              <a href="#"><img src="../Assets/Templates/Main/images/cat-large-item2.jpg" alt="categories"
                  class="product-image img-fluid"></a>
              <div class="category-content position-absolute p-md-5 ps-5 p-3 text-uppercase">
                <h4 class="section-title text-white display-6">Make-Up Products</h4>
                
              </div>
            </div>
          </div>
        </div>
        <div class="">
          <div class="cat-item position-relative">
            <div class="image-holder">
              <a href="#"><img src="../Assets/Templates/Main/images/cat-large-item3.jpg" alt="categories"
                  class="product-image img-fluid"></a>
              <div class="category-content position-absolute p-md-5 ps-5 p-3 text-uppercase">
                <h4 class="section-title text-white display-6">Beauty Products</h4>
                
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  

  <section class="collection container py-5">
    <div
      class="collection-item  row g-4 d-flex justify-content-between align-items-center flex-direction-row flex-wrap my-5">
      <div class="col-md-5 column-container">
        <div class="cat-item position-relative">
          <div class="image-holder">
            <a href="#"><img src="../Assets/Templates/Main/images/collection-banner.jpg" alt="categories"
                class="product-image img-fluid"></a>
            <div class="collection-content position-absolute p-5 text-uppercase  ">
              <h2 class="section-title text-white display-3 "> <strike>25%</strike> Now 50% OFF</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-7 column-container collection-bg">
        <div class="collection-content mx-md-5 my-5">
          <h2 class="element-title text-uppercase display-4 ">Summer collection</h2>
          <p>"Unlock your natural radiance with the skincare solutions offered by glowKare. Our premium selection of Korean products nourishes, hydrates, and rejuvenates, bringing you closer to a healthier complexion with each application. Combining tradition and innovation, discover the transformative power of skincare and reveal the glow that lies within. Elevate your routine and let your beauty shine!".</p>
          <a href="SearchProduct.php" class="btn btn-dark  text-uppercase mt-3">Shop Collection</a>

        </div>
      </div>
    </div>
  </section>

  <section class="logo-bar mt-5 py-5">
    <div class="container">
      <div class="row mt-5 ">
        <div class="logo-content d-flex flex-wrap justify-content-between">
          <img src="../Assets/Templates/Main/images/logo1.png" alt="logo" class="logo-image img-fluid my-3">
          <img src="../Assets/Templates/Main/images/logo2.png" alt="logo" class="logo-image img-fluid my-3">
          <img src="../Assets/Templates/Main/images/logo3.png" alt="logo" class="logo-image img-fluid my-3">
          <img src="../Assets/Templates/Main/images/logo4.png" alt="logo" class="logo-image img-fluid my-3">
          <img src="../Assets/Templates/Main/images/logo5.png" alt="logo" class="logo-image img-fluid my-3">
        </div>
      </div>
    </div>
  </section>

  <section class="blog my-5 py-5">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
        <h4 class="text-uppercase">Read Blog Posts</h4>
      </div>
      <div class="row">
        <div class="col-md-4">
          <article class="post-item">
            <div class="post-image">
              <a href="../Assets/Templates/Main/single-post.html">
                <img src="../Assets/Templates/Main/images/post-image1.jpg" alt="image" class="post-grid-image img-fluid">
              </a>
            </div>
            <div class="post-content d-flex flex-wrap gap-2 my-3">
              <div class="post-meta text-uppercase  text-secondary">
                
                
              </div>
              <h5 class="post-title text-uppercase">
                <a href="../Assets/Templates/Main/single-post.html">Why should I choose glowKare for skincare?</a>
              </h5>
              <p>glowKare offers curated, dermatologist-approved Korean skincare products, ensuring you achieve glowing, healthy skin with every purchase.

</p>
            </div>
          </article>
        </div>
        <div class="col-md-4">
          <article class="post-item">
            <div class="post-image">
              <a href="../Assets/Templates/Main/single-post.html">
                <img src="../Assets/Templates/Main/images/post-image2.jpg" alt="image" class="post-grid-image img-fluid">
              </a>
            </div>
            <div class="post-content d-flex flex-wrap gap-2 my-3">
              <div class="post-meta text-uppercase  text-secondary">
                
                
              </div>
              <h5 class="post-title text-uppercase">
                <a href="../Assets/Templates/Main/single-post.html">Top 10 make-up trend for summer</a>
              </h5>
              <p>The top 10 summer makeup trends include dewy skin, bright blush, glossy lips, pastel eyeshadow, bold brows</p>
            </div>
          </article>
        </div>
        <div class="col-md-4">
          <article class="post-item">
            <div class="post-image">
              <a href="single-post.html">
                <img src="../Assets/Templates/Main/images/post-image3.jpg" alt="image" class="post-grid-image img-fluid">
              </a>
            </div>
            <div class="post-content d-flex flex-wrap gap-2 my-3">
              <div class="post-meta text-uppercase  text-secondary">
                
                
              </div>
              <h5 class="post-title text-uppercase">
                <a href="../Assets/Templates/Main/single-post.html">daily skin care routine for teens</a>
              </h5>
              <p>The top brands featured on glowKare include COSRX, Beauty of Joseon, and Axis-Y, each known for their effective and innovative  skincare solutions.</p>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>

  

  <section class="instagram my-5 py-5">
    <div class="container">
      <h4 class="text-center py-3 ">Follow us on Instagram</h4>

      <div class="row d-flex flex-wrap my-3 g-0">
        <figure class=" col instagram-item magnific position-relative">
          <a href="#" class="">
            <img src="../Assets/Templates/Main/images/insta-item1.jpg" alt="instagram" class="insta-image">
            <div class="icon-overlay d-flex justify-content-center">
              
            </div>
          </a>
        </figure>
        <figure class=" col instagram-item magnific position-relative">
          <a href="#" class="">
            <img src="../Assets/Templates/Main/images/Fermented Korean Rice Toner.jfif" alt="instagram" class="insta-image"style="width: 260px; height: 260px;">
            <div class="icon-overlay d-flex justify-content-center">
              
            </div>
          </a>
        </figure>
        <figure class=" col instagram-item magnific position-relative">
          <a href="#" class="">
            <img src="../Assets/Templates/Main/images/insta-item4.jpg" alt="instagram" class="insta-image">
            <div class="icon-overlay d-flex justify-content-center">
              
            </div>
          </a>
        </figure>
        <figure class=" col instagram-item magnific position-relative">
          <a href="#" class="">
          <img src="../Assets/Templates/Main/images/Beauty of Joseon Rice1.jpg" alt="instagram" class="insta-image" style="width: 260px; height: 260px;">

            <div class="icon-overlay d-flex justify-content-center">
              
            </div>
          </a>
        </figure>
        <figure class=" col instagram-item magnific position-relative">
          <a href="#" class="">
            <img src="../Assets/Templates/Main/images/insta-item6.jpg" alt="instagram" class="insta-image">
            <div class="icon-overlay d-flex justify-content-center">
              
            </div>
          </a>
        </figure>
      </div>
    </div>
  </section>

  <?php
  include("Foot.php");
  ob_flush();
  ?>