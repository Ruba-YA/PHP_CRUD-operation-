<?php
require_once("../includes/db.php");
if(isset($_GET['delete']))
{
    $getpostID = $_GET['delete'];
    $del_query = "DELETE FROM posts WHERE post_id =$getpostID ";
    $del_result = mysqli_query($con, $del_query);
    
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>All Posts || Admin Panel</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="js/all.min.js"></script>
        <script src="js/feather.min.js"></script>
    </head>
    <body class="nav-fixed">
        <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
            <a class="navbar-brand d-none d-sm-block" href="index.php">Admin Panel</a><button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i data-feather="menu"></i></button>
            <ul class="navbar-nav align-items-center ml-auto">
                
                <li class="nav-item dropdown no-caret mr-3 dropdown-notifications">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="bell"></i></a>

                    
                </li>
                <li class="nav-item dropdown no-caret mr-3 dropdown-notifications">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownMessages" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="mail"></i></a>
                 
                </li>
                <li class="nav-item dropdown no-caret mr-3 dropdown-user">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="./assets/img/user.png"/></a>
                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <img class="dropdown-user-img" src="./assets/img/user.png" alt="Photo" />
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name">R</div>
                                <div class="dropdown-user-details-email">user@example.com</div>
                            </div>
                        </h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#!"
                            ><div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                            Account</a
                        ><a class="dropdown-item" href="#!"
                            ><div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            Logout</a
                        >
                    </div>
                </li>
            </ul>
        </nav>
        

        <!--Side Nav-->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sidenav shadow-right sidenav-light">
                    <div class="sidenav-menu">
                    <div class="nav accordion" id="accordionSidenav">
                            <a class="nav-link collapsed pt-4" href="index.php">
                                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"><div class="nav-link-icon"><i data-feather="layout"></i></div>
                                Posts
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" data-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                                    <a class="nav-link" href="all-post.php">All Posts</a>
                                    <a class="nav-link" href="add-new.php">Add New Post</a>
                                </nav>
                            </div>

                            <a class="nav-link" href="categories.php" ><div class="nav-link-icon"><i data-feather="chevrons-up"></i></div>
                                Categories
                            </a>


                         

                            <a class="nav-link" href="users.php" ><div class="nav-link-icon"><i data-feather="user"></i></div>
                                Users
                            </a>

                      
                        </div>
                    </div>

                    <div class="sidenav-footer">
                        <div class="sidenav-footer-content">
                            <div class="sidenav-footer-subtitle">Logged in as:</div>
                            <div class="sidenav-footer-title">RA</div>
                        </div>
                    </div>

                </nav>
            </div>


            <div id="layoutSidenav_content">
                <main>
                    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                        <div class="container-fluid">
                            <div class="page-header-content">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="layout"></i></div>
                                    <span>All Posts</span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    <!--Start Table-->
                    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">All Posts</div>
                            <div class="card-body">
                                <div class="datatable table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Author</th>
                                                <th>Image</th>
                                                <th>Date</th>
                                                <th>Content</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                    
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM posts ";
                                            $result = mysqli_query($con, $query);
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                                $post_id = $row['post_id'];
                                                $post_title = $row['Post_title'];
                                                $post_content = $row['post_content'];
                                                $post_user = $row['post_user'];
                                                $post_img = $row['post_image'];
                                                $post_cat_id = $row['cat_id'];
                                                $post_date = $row['post_date'];
                                          echo "
                                            <tr>
                                                <td> $post_id</td>
                                                <td>
                                                    <a href='#'> $post_title.</a>
                                                </td>
                                             
                                                <td>$post_cat_id</td>
                                                <td>$post_user</td>
                                                 <td> </td>
                                                <td>$post_date</td>
                                                <td>$post_content</td>
                                            
                                                <td>
                                                    <button class='btn btn-blue btn-icon'><i data-feather='edit'></i></button>
                                                </td>
                                                <td>
                                                <a href='all-post.php?delete= $post_id'>    <button class='btn btn-red btn-icon'><i data-feather='trash-2'></i></button></a>
                                                </td>
                                            </tr>  ";  }
                                            ?>
                                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Table-->

                </main>

                <!--start footer-->
                <footer class="footer mt-auto footer-light">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 small">Copyright &#xA9; online</div>
                            <div class="col-md-6 text-md-right small">
                                <a href="#!">Privacy Policy</a>
                                &#xB7;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!--end footer-->
            </div>
        </div>

        <!--Script JS-->
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
