<?php
include_once('views/main/navbar.php');
?>
<main>
    <style>
    .card-img-top:hover {
        transform: scale(0.9);
        transition: transform 0.3s ease;
    }

    @media only screen and (max-width : 992px) {}

    @media only screen and (max-width : 575px) {}

    @media only screen and (max-width : 830px) {}

    @media screen and (max-width: 540px) {
        #advertisement-product {
            margin-top: 120px;
        }

    }

    .square-box {
        background-color: white;
        /* Gray background color */
        padding: 20px;
        /* Adjust padding as needed */
        border-radius: 10px;
        /* Optional: Add rounded corners */
        height: 100%;
        /* Ensures the box takes the full height of the parent container */
        box-shadow: 0 15px 15px rgba(0, 0, 0, 0.1);
    }

    /* wrap the entire breadcrumb bar */
    .breadcrumb-nav {
        margin-top: 100px;
        background-color: #f6f6f6;
        padding: 0.5rem 0;
        /* vertical breathing room */
    }

    /* remove default bg and padding on the <ol> */
    .breadcrumb {
        background: transparent;
        padding: 0;
        margin-bottom: 0;
    }

    /* custom separator (you can swap ➔ for /, » or a SVG icon) */
    .breadcrumb-item+.breadcrumb-item::before {
        content: "➔";
        color: #6c757d;
        padding: 0 0.5rem;
    }

    /* link styles */
    .breadcrumb-item a {
        color: #0d6efd;
        text-decoration: none;
    }

    .breadcrumb-item a:hover {
        text-decoration: underline;
    }

    /* active (current) crumb */
    .breadcrumb-item.active {
        color: #495057;
        font-weight: 600;
    }
    </style>
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="index.php?page=main&controller=layouts&action=index">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Women
                </li>
            </ol>
        </div>
    </nav>

    <div class="container" style="margin-top: 10px">
        <div class="row">
            <!-- Item 1 -->
            <div class="col-md-4">
                <div class="square-box">
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <!-- Icon 1 -->
                        <i class="bi bi-person" style="font-size: 3rem; color: #001f3f;"></i>
                        <!-- Description 1 -->
                        <p class="text-center">Sản phẩm của Routine đảm bảo chất lượng tốt nhất, với sự chọn lọc cẩn
                            thận về
                            chất liệu để mang đến trải nghiệm thoải mái và lâu dài.</p>
                    </div>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="col-md-4">
                <div class="square-box">
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <!-- Icon 2 -->
                        <i class="bi bi-person" style="font-size: 3rem; color: #001f3f;"></i>
                        <!-- Description 2 -->
                        <p class="text-center">Routine tự hào về sự bền bỉ của sản phẩm, từ quy trình sản xuất đến
                            chất liệu chọn lọc, để đảm bảo bạn luôn có quần áo đáng tin cậy.</p>
                    </div>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="col-md-4">
                <div class="square-box">
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <!-- Icon 3 -->
                        <i class="bi bi-person" style="font-size: 3rem; color: #001f3f;"></i>
                        <!-- Description 3 -->
                        <p class="text-center">Với quy trình kiểm soát chất lượng nghiêm ngặt, mỗi sản phẩm đều được
                            đảm
                            bảo vượt qua các tiêu chuẩn cao nhất, mang đến sự hài lòng cho khách hàng.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Items -->
    <div class="container-fluid py-2" style="margin-top: 10px">
        <div class="container-fluid px-4 px-lg-6 mt-4">
            <div style="display: flex; justify-content: flex-end; margin-top: 10px">
                <select id="sortOption" name=""
                    style="margin-left: auto; border-radius: 10px; height: 30px; width: 300px; border-color: #ccc;"
                    onchange="sortProducts()">
                    <option value="default">Sắp xếp theo</option>
                    <option value="highToLow">Giá cao đến thấp</option>
                    <option value="lowToHigh">Giá thấp đến cao</option>
                </select>

            </div>
            <div class="row" style="margin-top: 30px; padding-left: 60px">
                <div id="card-content"
                    class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-4 justify-content-center">
                    <?php
                    // Lặp qua danh sách sản phẩm và hiển thị card
                    foreach ($womenproducts as $womenproduct) {
                        echo '<div id="card" class="col mb-3">
                        <a href="index.php?page=main&controller=detail&id=' . $womenproduct->id . '&action=index"
                            class="card h-100 text-decoration-none">';

                        if ($womenproduct->sale) {
                            echo '<div class="badge bg-dark text-light position-absolute"
                                style="top: 0.5rem; right: 0.5rem"> - ' . $womenproduct->sale . '%</div>';
                        }

                        echo '<img class="card-img-top" src="' . $womenproduct->img . '" alt="..."
                                style="height: 80%; width: auto;">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <p class="product-name text-muted" style="font-size: 1em">' . $womenproduct->name .
                            '</p>
                                    <span class="fw-bold">' . number_format($womenproduct->price * (100 -
                                $womenproduct->sale) / 100, 0, ',', '.') . ' đ</span>
                                    <span class="text-muted text-decoration-line-through">' .
                            number_format($womenproduct->price, 0, ',', '.') . ' đ</span>';

                        if ($womenproduct->vote_number == 0) {
                            echo '<p class="product-name text-muted" style="font-size: 1em">' .
                                $womenproduct->vote_number . ' lượt đánh giá</p>';
                        } else {
                            echo '<p class="product-name text-muted" style="font-size: 1em">' .
                                $womenproduct->vote_number . ' lượt đánh giá</p>
                                    <p class="product-name text-muted" style="font-size: 1em">' .
                                $womenproduct->total_stars / $womenproduct->vote_number . ' đánh giá trung bình
                                    </p>';
                        }

                        echo '
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <!-- Optional: Keep this div if you want to maintain the same structure -->
                                </div>
                            </div>
                        </a>
                    </div>';
                    }

                    ?>
                </div>



            </div>

        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">

                <li class="page-item">
                    <a class="page-link previous-page" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link .next-page" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>



    <script type="text/javascript">
    function getPageList(totalPages, page, maxLength) {
        function range(start, end) {
            return Array.from(Array(end - start + 1), (_, i) => i + start);
        }

        var sideWidth = maxLength < 9 ? 1 : 2;
        var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
        var rightWidth = (maxLength - sideWidth * 2 - 3) >> 1;

        if (totalPages <= maxLength) {
            return range(1, totalPages);
        }

        if (page <= maxLength - sideWidth - 1 - rightWidth) {
            return range(1, maxLength - sideWidth - 1).concat(0, range(totalPages - sideWidth + 1, totalPages));
        }

        if (page >= totalPages - sideWidth - 1 - rightWidth) {
            return range(1, sideWidth).concat(0, range(totalPages - sideWidth - 1 - rightWidth - leftWidth,
                totalPages));
        }

        return range(1, sideWidth).concat(0, range(page - leftWidth, page + rightWidth), 0, range(totalPages -
            sideWidth + 1, totalPages));
    }

    $(function() {
        var numberOfItems = $("#card-content #card").length;
        var limitPerPage = 8; //How many card items visible per a page
        var totalPages = Math.ceil(numberOfItems / limitPerPage);
        var paginationSize = 7; //How many page elements visible in the pagination
        var currentPage;

        function showPage(whichPage) {
            if (whichPage < 1 || whichPage > totalPages) return false;

            currentPage = whichPage;

            $("#card-content #card").hide().slice((currentPage - 1) * limitPerPage, currentPage *
                    limitPerPage)
                .show();

            $(".pagination li").slice(1, -1).remove();

            getPageList(totalPages, currentPage, paginationSize).forEach(item => {
                $("<li>").addClass("page-item").addClass(item ? "current-page" : "dots")
                    .toggleClass("active", item === currentPage).append($("<a>").addClass(
                            "page-link")
                        .attr({
                            href: "javascript:void(0)"
                        }).text(item || "...")).insertBefore(".next-page");
            });

            $(".previous-page").toggleClass("disable", currentPage === 1);
            $(".next-page").toggleClass("disable", currentPage === totalPages);
            return true;
        }

        $(".pagination").append(
            $("<li>").addClass("page-item").addClass("previous-page").append($("<a>").addClass(
                    "page-link")
                .attr({
                    href: "javascript:void(0)"
                }).text("Prev")),
            $("<li>").addClass("page-item").addClass("next-page").append($("<a>").addClass("page-link")
                .attr({
                    href: "javascript:void(0)"
                }).text("Next"))
        );

        $("#card-content").show();
        showPage(1);

        $(document).on("click", ".pagination li.current-page:not(.active)", function() {
            return showPage(+$(this).text());
        });

        $(".next-page").on("click", function() {
            return showPage(currentPage + 1);
        });

        $(".previous-page").on("click", function() {
            return showPage(currentPage - 1);
        });
    });
    </script>
    <script>
    function sortProducts() {
        var sortOption = document.getElementById("sortOption");
        var selectedValue = sortOption.value;

        // Xử lý sự kiện khi lựa chọn giá trị
        if (selectedValue === "highToLow") {
            window.location.href = 'index.php?page=main&controller=womenproducts&action=sortByPriceHighToLow';
        } else if (selectedValue === "lowToHigh") {
            window.location.href = 'index.php?page=main&controller=womenproducts&action=sortByPriceLowToHigh';
        }
        // Các trường hợp sắp xếp khác nếu cần
    }
    </script>



</main>

<?php
include_once('views/main/footer.php');
?>