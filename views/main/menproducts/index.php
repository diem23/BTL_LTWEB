<?php
include_once('views/main/navbar.php');
?>
<?php
// 1) Define your features
$features = [
    [
        'icon' => '<i class="fas fa-shopping-bag fa-2x text-dark"></i>',
        'description' => 'Sản phẩm của Routine đảm bảo chất lượng tốt nhất, với sự chọn lọc cẩn thận về chất liệu để mang đến trải nghiệm thoải mái và lâu dài.',
    ],
    [
        'icon' => '<i class="fas fa-award fa-2x text-dark"></i>',
        'description' => 'Routine tự hào về sự bền bỉ của sản phẩm, từ quy trình sản xuất đến chất liệu chọn lọc, để đảm bảo bạn luôn có quần áo đáng tin cậy.',
    ],
    [
        'icon' => '<i class="fas fa-shield-alt fa-2x text-dark"></i>',
        'description' => 'Với quy trình kiểm soát chất lượng nghiêm ngặt, mỗi sản phẩm đều được đảm bảo vượt qua các tiêu chuẩn cao nhất, mang đến sự hài lòng cho khách hàng.',
    ],
];
?>
<?php
// 1) Grab the current action from the query string
//    Default to 'index' if no sort action is present
$currentAction = $_GET['action'] ?? 'index';

// 2) Map your <option> values to those action names
$sortOptions = [
    'default'      => ['label' => 'Sắp xếp theo',               'action' => 'index'],
    'highToLow'    => ['label' => 'Giá cao đến thấp',            'action' => 'sortByPriceHighToLow'],
    'lowToHigh'    => ['label' => 'Giá thấp đến cao',            'action' => 'sortByPriceLowToHigh'],
];
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
        margin-top: 76px;
        /* background-color: #f6f6f6; */
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
        content: ">";
        color: #6c757d;
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

    .feature-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .feature-card:hover {
        transform: scale(1.05);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .product-card {
        background: #fff;
        border-radius: .75rem;
        overflow: hidden;
        box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075);
        transition: transform .3s ease, box-shadow .3s ease;
    }

    .product-card:hover {
        transform: scale(1.02);
        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15);
    }

    /* 3:4 aspect ratio wrapper */
    .product-image-wrapper {
        position: relative;
        width: 100%;
        padding-top: 133.3333%;
        /* 4/3 = 133.33% */
        background: #f8f9fa;
        overflow: hidden;
    }

    .product-image-wrapper img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .5s ease;
    }

    .product-card:hover .product-image-wrapper img {
        transform: scale(1.05);
    }

    /* Truncate name to two lines */
    .product-name {
        font-size: .875rem;
        color: #6b7280;
        margin-bottom: .5rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Prices */
    .product-price {
        font-weight: 600;
        color: #111827;
        font-size: 1rem;
    }

    .product-price-original {
        margin-left: .5rem;
        font-size: .875rem;
        color: #6b7280;
        text-decoration: line-through;
    }

    /* Ratings */
    .rating {
        margin-top: .5rem;
        display: flex;
        align-items: center;
        font-size: .875rem;
        color: #6b7280;
    }

    .star {
        width: 14px;
        height: 14px;
        margin-right: 2px;
    }

    .star.filled {
        color: #f59e0b;
        /* yellow-400 */
    }

    .star.empty {
        color: #d1d5db;
        /* gray-300 */
    }

    /* Pagination: set the active page’s background to #f6f6f6 */
    .pagination .page-item.active .page-link {
        background-color: #f6f6f6;
        border-color: rgb(166, 159, 159);
        color: #000;
        /* adjust text color if you need more contrast */
    }

    /* Optional: keep the hover state consistent */
    .pagination .page-item.active .page-link:hover {
        background-color: #e5e5e5;
        border-color: #e5e5e5;
    }
    </style>
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="index.php?page=main&controller=layouts&action=index">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Men
                </li>
            </ol>
        </div>
    </nav>
    <div class="container pt-4">
        <div class="row g-4">
            <?php foreach ($features as $feature): ?>
            <div class="col-12 col-md-4">
                <div class="card  feature-card border-0 shadow ">
                    <div class="card-body text-center d-flex flex-column justify-content-center">
                        <div class="mb-3">
                            <div
                                class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center p-3">
                                <?= $feature['icon']; ?>
                            </div>
                        </div>
                        <p class="card-text text-secondary">
                            <?= $feature['description']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Items Section -->
    <div class="container-fluid py-2">
        <div class="container px-4 px-lg-6 mt-4">

            <!-- Sort Dropdown -->
            <div class="d-flex justify-content-end mb-3">
                <select id="sortOption" class="form-select w-auto" onchange="sortProducts()">
                    <option value="default"
                        <?= ($_GET['action'] ?? 'index') === 'index'                     ? 'selected' : '' ?>>
                        Sắp xếp theo
                    </option>
                    <option value="highToLow"
                        <?= ($_GET['action'] ?? '') === 'sortByPriceHighToLow'      ? 'selected' : '' ?>>
                        Giá cao đến thấp
                    </option>
                    <option value="lowToHigh"
                        <?= ($_GET['action'] ?? '') === 'sortByPriceLowToHigh'      ? 'selected' : '' ?>>
                        Giá thấp đến cao
                    </option>
                </select>
            </div>

            <!-- Product Grid -->
            <div id="card-content" class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4">
                <?php foreach ($menproducts as $product): ?>
                <div id="card" class="col">
                    <a href="index.php?page=main&controller=detail&id=<?= $product->id ?>&action=index"
                        class="text-decoration-none text-reset">

                        <div class="product-card position-relative h-100">

                            <!-- Sale Badge -->
                            <?php if (!empty($product->sale)): ?>
                            <div class="badge bg-black text-white position-absolute"
                                style="top: .5rem; right: .5rem; z-index:10;">
                                -<?= $product->sale ?>%
                            </div>
                            <?php endif; ?>

                            <!-- Image -->
                            <div class="product-image-wrapper">
                                <img src="<?= htmlspecialchars($product->img, ENT_QUOTES); ?>"
                                    alt="<?= htmlspecialchars($product->name, ENT_QUOTES); ?>">
                            </div>

                            <!-- Info -->
                            <div class="p-3">
                                <h3 class="product-name">
                                    <?= htmlspecialchars($product->name, ENT_QUOTES); ?>
                                </h3>

                                <div class="d-flex align-items-baseline">
                                    <span class="product-price">
                                        <?= number_format($product->price * (100 - $product->sale) / 100, 0, ',', '.'); ?>
                                        đ
                                    </span>
                                    <?php if ($product->sale > 0): ?>
                                    <span class="product-price-original">
                                        <?= number_format($product->price, 0, ',', '.'); ?> đ
                                    </span>
                                    <?php endif; ?>
                                </div>

                                <!-- Ratings -->
                                <div class="rating">
                                    <?php if ($product->vote_number > 0):
                                            $avg = round($product->total_stars / $product->vote_number); ?>
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <svg class="star <?= $i <= $avg ? 'filled' : 'empty'; ?>"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 .587l3.668 7.431L23.4 9.6l-5.5 5.356L18.751 23 
                                   12 19.771 5.249 23l.85-7.045L.6 9.6l7.732-1.582z" />
                                    </svg>
                                    <?php endfor; ?>
                                    <span class="ms-1">(<?= $product->vote_number; ?>)</span>
                                    <?php else: ?>
                                    <span>Chưa có đánh giá</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    </a>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Pagination Controls -->
            <div class="d-flex justify-content-center mt-4">
                <ul class="pagination"></ul>
            </div>

        </div>
    </div>





    <!-- jQuery (for pagination script) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sort Handler -->
    <script>
    function sortProducts() {
        const map = {
            default: 'index',
            highToLow: 'sortByPriceHighToLow',
            lowToHigh: 'sortByPriceLowToHigh'
        };
        const sel = document.getElementById('sortOption').value;
        const action = map[sel] || 'index';
        window.location.href = `index.php?page=main&controller=womenproducts&action=${action}`;
    }
    </script>

    <!-- Pagination Script -->
    <script>
    $(function() {
        const totalItems = $('#card-content #card').length;
        const limitPerPage = 8;
        const totalPages = Math.ceil(totalItems / limitPerPage);
        const paginationSize = 7;
        let currentPage;

        function range(start, end) {
            return Array.from({
                length: end - start + 1
            }, (_, i) => start + i);
        }

        function getPageList(total, page, maxLen) {
            const sideWidth = maxLen < 9 ? 1 : 2;
            const leftWidth = (maxLen - sideWidth * 2 - 3) >> 1;
            const rightWidth = leftWidth;
            if (total <= maxLen) return range(1, total);
            if (page <= maxLen - sideWidth - 1 - rightWidth) {
                return range(1, maxLen - sideWidth - 1)
                    .concat(0, range(total - sideWidth + 1, total));
            }
            if (page >= total - sideWidth - 1 - rightWidth) {
                return range(1, sideWidth)
                    .concat(0, range(total - sideWidth - 1 - rightWidth - leftWidth, total));
            }
            return range(1, sideWidth)
                .concat(0, range(page - leftWidth, page + rightWidth), 0,
                    range(total - sideWidth + 1, total));
        }

        function showPage(page) {
            if (page < 1 || page > totalPages) return false;
            currentPage = page;
            $('#card-content #card')
                .hide()
                .slice((page - 1) * limitPerPage, page * limitPerPage)
                .show();

            const pag = $('.pagination').empty();
            pag.append('<li class="page-item previous-page"><a class="page-link" href="#">Prev</a></li>');

            getPageList(totalPages, page, paginationSize).forEach(item => {
                const li = $('<li>')
                    .addClass('page-item')
                    .toggleClass('active', item === page)
                    .toggleClass('dots', item === 0);
                const a = $('<a>')
                    .addClass('page-link')
                    .attr('href', 'javascript:void(0)')
                    .text(item || '...');
                li.append(a);
                pag.append(li);
            });

            pag.append('<li class="page-item next-page"><a class="page-link" href="#">Next</a></li>');
            pag.find('.previous-page').toggleClass('disabled', page === 1);
            pag.find('.next-page').toggleClass('disabled', page === totalPages);

            return true;
        }

        // Initialize
        showPage(1);

        // Handle clicks
        $(document).on('click', '.pagination li', function(e) {
            e.preventDefault();

            let targetPage = null;
            const li = $(this);

            if (li.hasClass('previous-page')) {
                targetPage = currentPage - 1;
            } else if (li.hasClass('next-page')) {
                targetPage = currentPage + 1;
            } else {
                const txt = parseInt(li.text(), 10);
                if (!isNaN(txt)) targetPage = txt;
            }

            if (targetPage !== null) {
                showPage(targetPage);

                // native smooth scroll, much snappier
                const top = $('#card-content').offset().top - 20;
                window.scroll({
                    top,
                    behavior: 'smooth'
                });
            }
        });
    });
    </script>

</main>

<?php
include_once('views/main/footer.php');
?>