<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Trang Chủ Diễn Đàn</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .header-section {
            margin-bottom: 20px;
        }

        .list-group-item img {
            width: 35px;
            height: 35px;
            margin-right: 10px;
        }

        .list-group-item a {
            text-decoration: none;
            color: #000;
        }

        .content-wrapper {
            display: flex;
            flex-direction: column;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .content-wrapper a {
            color: #479fdf;
        }

        .content-wrapper a.topic-name:hover {
            color: orange;
        }

        .post_btn {
            margin-left: 435px;
            background-color: orange;
            color: white;
            height: 40px;

        }

        .filter_btn {
            border: none;
            background-color: #f1f8fd;
        }

        .dropdown-menu {
            position: absolute;
            background-color: white;
            margin-right: 600px;
            border-top: 5px solid cyan;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .li_nav {
            background-color: #f1f8fd;
        }
    </style>
</head>

<body>
    <?php
    require "../trangchu/config.php";
    session_start();

    // Lấy dữ liệu từ session
    $search_results = $_SESSION["search_results"];
    $total_search = $_SESSION["total_search"];
    $search_per_page = $_SESSION["search_per_page"];
    $search  = $_SESSION['search'];
    $current_page = $_SESSION["current_page"];

    // Tính tổng số trang
    $total_pages = ceil($total_search / $search_per_page);
    ?>
    <div class="container mt-5">
        <div class="header-section d-flex justify-content-between align-items-center mb-4">
            <form class="form-inline">
                <div class="input-group">
                    <input class="form-control" type="search" placeholder="Tìm kiếm..." aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <div>
                <a href="#" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Đăng Nhập</a>
                <a href="#" class="btn btn-secondary"><i class="fas fa-sign-out-alt"></i> Đăng Xuất</a>
            </div>
        </div>

        <span><a href="../trangchu/home.php">Home <i class="bi bi-caret-left"></i> </a><a href="#">Thread name?</a>
        </span>
        <!-- Thay bằng tên của Post -->
        <h3 class=""><?php echo $search; ?></h3>
        <div class="row">
            <!-- Liên kết phân trang -->
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php if ($current_page > 1): ?>
                        <li class="page-item">
                            <a class="page-link"
                                href=".../Code/Home/search.php?search=<?php echo urlencode($search ); ?>&page=<?php echo $current_page - 1; ?>">Trang
                                trước</a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?php if ($i == $current_page)
                            echo 'active'; ?>">
                            <a class="page-link"
                                href=".../Code/Home/search.php?search=<?php echo urlencode($search ); ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($current_page < $total_pages): ?>
                        <li class="page-item">
                            <a class="page-link"
                                href=".../Code/Home/search.php?search=<?php echo urlencode($search ); ?>&page=<?php echo $current_page + 1; ?>">Trang
                                sau</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
            <ul class="list-group">
                <?php foreach ($search_results as $value): ?>
                    <li class="list-group-item d-flex">
                        <img src="..." alt="icon" class="my-1 mr-3">
                        <div class="content-wrapper ">
                            <a href="#" class="topic-name font-weight-bold"><?php echo htmlspecialchars($value['Title']); ?></a>
                            <span><?php echo htmlspecialchars($value['content']); ?></span>
                            <div><span>username</span> |
                                <span><?php echo htmlspecialchars($value['thread_created_at']); ?></span>
                            </div>
                        </div>
                    </li>
                <?php endforeach ?>
            </ul>
            <h3></h3>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php if ($current_page > 1): ?>
                        <li class="page-item">
                            <a class="page-link"
                                href=".../Code/Home/search.php?search=<?php echo urlencode($search); ?>&page=<?php echo $current_page - 1; ?>">Trang
                                trước</a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?php if ($i == $current_page)
                            echo 'active'; ?>">
                            <a class="page-link"
                                href=".../Code/Home/search.php?search=<?php echo urlencode($search); ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($current_page < $total_pages): ?>
                        <li class="page-item">
                            <a class="page-link"
                                href=".../Code/Home/search.php?search=<?php echo urlencode($search); ?>&page=<?php echo $current_page + 1; ?>">Trang
                                sau</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>


        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>