<?php
include_once('views/main/navbar.php');
?>

<?php
$carouselImages = [
    ["src" => "https://media.routine.vn/1920x0/prod/media/f-website-lp-coffee-lovers-png-ex97.webp", "alt" => "Slide 1 description"],
    ["src" => "https://media.routine.vn/1920x0/prod/media/banner-web-pc-png-vtcs.webp", "alt" => "Slide 2 description"],
    ["src" => "https://media.routine.vn/1920x0/prod/media/cfl-nu-pc-png-2prq.webp", "alt" => "Slide 3 description"],
];
?>

<!-- <div id="advertisement-product" class="container-fluid d-block" style="margin-top: 80px;">
    <div class="row banner">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://media.routine.vn/1920x0/prod/media/f-website-lp-coffee-lovers-png-ex97.webp"
                        class="d-block w-100" alt="..."
                        style="width: 100%; object-fit: cover; object-position: center;">
                </div>
                <div class="carousel-item">
                    <img src="https://media.routine.vn/1920x0/prod/media/banner-web-pc-png-vtcs.webp"
                        class="d-block w-100" alt="..." style="width: 100%; height: 100%; object-position: center;">
                </div>
                <div class="carousel-item">
                    <img src="https://media.routine.vn/1920x0/prod/media/cfl-nu-pc-png-2prq.webp" class="d-block w-100"
                        alt="..." style="width: 100%; height: 100%; object-position: center;">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div> -->
<div id="myCarousel">
    <img id="carouselImage" src="" alt="">
    <button id="prevBtn" class="carousel-btn" aria-label="Previous slide">&#10094;</button>
    <button id="nextBtn" class="carousel-btn" aria-label="Next slide">&#10095;</button>
    <div id="carouselIndicators"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>

<main id="main" style="margin-top: 20px;">

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up " style="box-shadow: 0 5px 10px rgba(0,0,0,.2);">

            <div class="row content">
                <div class="container px-4 px-lg-6">
                    <div class="row m-4">
                        <h2 class="text-center mt-3"><span class="fw-bold">ROUTINE</span> - <span
                                class=" fw-bold">Thương hiệu thời trang số 1 Việt Nam</span>
                        </h2><br>

                        <p class="text-center">
                            <span class="fw-bold">Tạo dựng phong cách bằng những tuyên ngôn thời trang</span>

                        <p class="justify-content">
                            <span style="display: flex; justify-content: center; align-items: center;">
                                <img style="width: 40px; height: 40px;"
                                    src="https://media.routine.vn/100x0/prod/media/a31071fa-22a1-440b-a6d2-776d07fe0419.webp"
                                    alt="">
                            </span>
                            <br>
                            Như ý nghĩa của tên gọi, trang phục của Routine hướng đến việc trở thành thói quen, lựa chọn
                            hàng ngày cho nam giới trong mọi tình huống. Bởi Routine hiểu rằng, sự tự tin về phong cách
                            ăn mặc sẽ làm nền tảng, tạo động lực cổ vũ mỗi người mạnh dạn theo đuổi những điều mình mong
                            muốn. Trong đó, trang phục nam phải mang vẻ đẹp lịch lãm, hợp mốt và tạo sự thoải mái, quan
                            trọng nhất là mang đến cảm giác “được là chính mình” cho người mặc.
                            <br>
                            <br>
                            Thời trang Routine thuyết phục khách hàng bằng từng kiểu dáng trang phục thiết kế độc
                            quyền, sự sắc sảo trong mỗi đường nét cắt may, sử dụng chất liệu vải cao cấp và luôn hòa
                            điệu cùng xu hướng quốc tế. Đây là con đường Routine theo đuổi và hướng đến phát triển
                            bền vững.
                            <br>
                            <br>
                            Thành lập từ năm 2013, đến nay hệ thống cửa hàng của Routine đang là địa chỉ
                            “One stop fashion shop” cung ứng cho nam giới mọi nhu cầu về thời trang với tất cả các
                            loại trang phục, phụ kiện. Phong cách tối giản đặc trưng của Routine mang đến sự gần
                            gũi, đa dụng và đủ sức tạo nên dấu ấn riêng cho người mặc. Các sản phẩm quần tây, áo sơ
                            mi, quần jeans, áo thun, áo jacket... đều được thiết kế năng động, dễ dàng kết hợp để
                            mặc đi làm, đi chơi hay du lịch. Routine hiện có hệ thống 27 cửa hàng tại TP.HCM, Hà
                            Nội, Hải phòng, Đà Nẵng, Kiên Giang và Vũng Tàu. Thương hiệu thường xuyên ra mắt bộ sưu
                            tập riêng, bắt kịp xu hướng thời trang quốc tế.
                        </p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End About Us Section -->


    <div id=" news" onclick="window.location.href='/BigFarm/index.php?page=main&controller=blog&action=index'">
    </div>
    <div id="contact" onclick="window.location.href='/BigFarm/index.php?page=main&controller=contact&action=index'"
        style=" box-shadow: 0 5px 10px rgba(0,0,0,.2);">

    </div>
    <script>
        $(function() {
            $("#about").load(
                "http://localhost/BigFarm/index.php?page=main&controller=about&action=index #about-page");
        });
        $(function() {
            $("#news").load("http://localhost/BigFarm/index.php?page=main&controller=blog&action=index #blog");
        });
        $(function() {
            $("#contact").load(
                "http://localhost/BigFarm/index.php?page=main&controller=contact&action=index #contact");
        });
    </script>


</main><!-- End #main -->

<script>
    // a) Pull in PHP array
    const images = <?php echo json_encode($carouselImages, JSON_HEX_TAG); ?>;
    let currentIndex = 0;
    const autoSlideMs = 5000;

    // b) DOM refs
    const imgEl = document.getElementById('carouselImage');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const indicatorsContainer = document.getElementById('carouselIndicators');

    // c) Build indicators
    images.forEach((_, idx) => {
        const dot = document.createElement('div');
        dot.className = 'indicator';
        dot.addEventListener('click', () => goToSlide(idx));
        indicatorsContainer.appendChild(dot);
    });
    const indicators = Array.from(document.querySelectorAll('.indicator'));

    // d) Render a slide
    function updateSlide() {
        const {
            src,
            alt
        } = images[currentIndex];
        imgEl.style.opacity = 0;
        setTimeout(() => {
            imgEl.src = src;
            imgEl.alt = alt;
            imgEl.style.opacity = 1;
        }, 200);
        indicators.forEach((dot, i) => dot.classList.toggle('active', i === currentIndex));
    }

    // e) Navigation
    function goToPrevious() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateSlide();
    }

    function goToNext() {
        currentIndex = (currentIndex + 1) % images.length;
        updateSlide();
    }

    function goToSlide(idx) {
        currentIndex = idx;
        updateSlide();
    }

    // f) Event listeners
    prevBtn.addEventListener('click', goToPrevious);
    nextBtn.addEventListener('click', goToNext);

    // g) Auto-slide
    setInterval(goToNext, autoSlideMs);

    // h) Start
    updateSlide();
</script>


<?php
include_once('views/main/footer.php');
?>