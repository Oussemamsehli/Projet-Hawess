<?php

include "../../controller/postController.php";
include "../../controller/commentController.php";
include "../../controller/likeDislikeController.php";
$commentController = new CommentController();
$likeDislikeController=new LikeDislikeController();


$postController = new PostController();


$posts = $postController->getAllPosts();








    ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Travela - Tourism Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Topbar Start -->
        <div class="container-fluid bg-primary px-5 d-none d-lg-block">
            <div class="row gx-0">
                <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <a href="#"><small class="me-3 text-light"><i class="fa fa-user me-2"></i>Register</small></a>
                        <a href="#"><small class="me-3 text-light"><i class="fa fa-sign-in-alt me-2"></i>Login</small></a>
                        <div class="dropdown">
                           // <a href="#" class="dropdown-toggle text-light" data-bs-toggle="dropdown"><small><i class="fa fa-home me-2"></i> My Dashboard</small></a>
                            <div class="dropdown-menu rounded">
                                <a href="#" class="dropdown-item"><i class="fas fa-user-alt me-2"></i> My Profile</a>
                                 <a href="#" class="dropdown-item"><i class="fas fa-power-off me-2"></i> Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0"><i class="fa fa-map-marker-alt me-3"></i>HAWESS</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.html" class="nav-item nav-link">Home</a> 
                         <a href="services.html" class="nav-item nav-link">camping and desttination</a>
                         <a href="packages.html" class="nav-item nav-link">activities</a>
                        <a href="blog.html" class="nav-item nav-link">Blog</a>
                         <a href="about.html" class="nav-item nav-link">About</a>
                       
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">HOME</a>
                </div>
            </nav>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Our Blog</h1>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-white">Blog</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        <!-- Blog Start -->
        <div class="container-fluid blog py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Our Blog</h5>
                    <h1 class="mb-4">Popular Travel Blogs</h1>
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti deserunt tenetur sapiente atque. Magni non explicabo beatae sit, vel reiciendis consectetur numquam id similique sunt error obcaecati ducimus officia maiores.
                    </p>
                    <br>
                    <div class="class form-control">
                        <button type="button" class="btn btn-primary rounded-pill py-2 px-4" data-bs-toggle="modal" data-bs-target="#createPostModal">Create New Pub</button>
                    </div>
                    


                </div>
                <?php foreach ($posts as $post) { ?>
                   
                 
    <div class="row justify-content-center">
       
        
        <div class="blog-item position-relative">
        <div class="dropdown position-absolute top-0 end-0">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Options
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li> <button type="button" class="btn btn-info edit-post-btn" data-bs-toggle="modal" data-bs-target="#editPostModal" data-post-id="<?php echo $post['id']; ?>" data-post='<?php echo json_encode($post); ?>'>Edit</button></li>
                    <li>
                    <form action="deletePostHandler.php" method="post">
                    <input type="hidden" name="postId" value="<?php echo $post['id']; ?>">
                    <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                </form>
                </li>
                </ul>
            </div>
             
            <div class="blog-img">
                <div class="blog-img-inner">
                    <img class="img-fluid w-100 rounded-top" src="uploads/<?php echo $post['image']; ?>" alt="Image">
                 
                    <div class="blog-icon">
                        <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                    </div>
                </div>
               
                <div class="blog-info d-flex align-items-center border border-start-0 border-end-0">
                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i><?php echo date("d M Y", strtotime($post['timestamp'])); ?></small>
                    <?php
// Assuming $likeDislikeController is an instance of LikeDislikeController

$likeCount = $likeDislikeController->getLikeCount($post['id']);
$dislikeCount = $likeDislikeController->getDislikeCount($post['id']);

?>
                    
                    
                    
                  

                     <form class="flex-fill text-center border-end py-2 like-dislike-form" action="like_dislike_handler.php" method="post">
        <input type="hidden" name="postId" value="<?php echo $post['id']; ?>">
        <input type="hidden" name="userId" value="<?php echo $post['userId']; ?>">
        <input type="hidden" name="action" value="like">
        <button type="submit" class="btn-hover text-center text-white py-2">
            <i class="fa fa-thumbs-up text-primary me-2"></i><?php echo $likeCount; ?>
        </button>
    </form>
    <form class="flex-fill text-center text-white py-2 like-dislike-form" action="like_dislike_handler.php" method="post">
        <input type="hidden" name="postId" value="<?php echo $post['id']; ?>">
        <input type="hidden" name="userId" value="<?php echo $post['userId']; ?>">
        <input type="hidden" name="action" value="dislike">
        <button type="submit" class="btn-hover text-center text-white py-2">
            <i class="fa fa-thumbs-down text-primary me-2"></i><?php echo $dislikeCount; ?>
        </button>
    </form>
                    
                    <a href="#" class="btn-hover flex-fill text-center text-white py-2 comment-icon" data-post-id="<?php echo $post['id']; ?>">
                    <i class="fa fa-comments text-primary me-2"> </i><?php
                $commentsData = $commentController->getCommentsByPostId($post['id']);
                $commentCount = $commentsData['commentCount'];
                echo  $commentCount
                ?>
                   </a>
              
            </div>
        
</div>
            <div class="blog-content border border-top-0 rounded-bottom p-4">
           
                <p class="mb-3">Posted By: <?php echo $post['userId']; ?></p>
                <a href="#" class="h4"><?php echo $post['title']; ?></a>
                <p class="my-3"><?php echo $post['content']; ?></p>
                <a href="#" class="btn btn-primary rounded-pill py-2 px-4">Read More</a>
            </div>
            <div class="comments-container" id="comments-container-<?php echo $post['id']; ?>" style="display: none;">
            <?php
                $comments = $commentsData['comments'];
                foreach ($comments as $comment) {
                    echo '<div class="comment">' . $comment['content'] . '</div>';
                }
                ?>
            </div>
            <div style="display: none" class="comment-input" id="comment-input-<?php echo $post['id']; ?>">
                    <form method="post" action="createComment.php">
                    <input type="hidden" name="postId" value="<?php echo $post['id']; ?>">
                     <input type="hidden" name="userId" value="<?php echo $post['userId']; ?>">
                        <input type="text" class="form-control" placeholder="Write your comment here" name="content">
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>
          
        </div>
    </div>
    <?php
    } ?>
            
            </div>
        </div>
        <!-- Create New Pub Modal -->
        <div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createPostModalLabel">Create New Publication</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="process_post.php" enctype="multipart/form-data">
                           
                            <div class="mb-3">
                                <label for="postTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" id="postTitle" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="postContent" class="form-label">Content</label>
                                <textarea class="form-control" id="postContent" name="content" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="postImage" class="form-label">Image</label>
                                <input type="file" class="form-control" id="postImage" name="image" accept="image/*" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
         <!-- Edit a  Modal -->
         <div class="modal fade" id="editPostModal" tabindex="-1" aria-labelledby="editPostModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPostModalLabel">Edit Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form id="editPostForm" method="post" action="updatePostHandler.php" enctype="multipart/form-data">
    <input type="hidden" name="postId" id="editPostId">
    <div class="mb-3">
        <label for="editPostTitle" class="form-label">Title</label>
        <input type="text" class="form-control" id="editPostTitle" name="title" required>
    </div>
    <div class="mb-3">
        <label for="editPostContent" class="form-label">Content</label>
        <textarea class="form-control" id="editPostContent" name="content" rows="4" required></textarea>
    </div>
    <div class="mb-3">
        <label for="editPostImage" class="form-label">Image</label>
        <img id="currentPostImage" class="img-fluid w-100 rounded-top" src="" alt="Current Image">
    <!-- Input field to select a new image -->
    <input type="file" class="form-control" id="editPostImage" name="image" accept="image/*">
        <!-- Display the current image -->
       
    </div>
    <button type="submit" class="btn btn-primary">Update Post</button>
</form>
            </div>
        </div>
    </div>
</div>

        
        <script>
   document.addEventListener('DOMContentLoaded', function () {
            const commentIcons = document.querySelectorAll('.comment-icon');

            commentIcons.forEach(icon => {
                icon.addEventListener('click', function (event) {
                    event.preventDefault();
                    const postId = this.getAttribute('data-post-id');
                    const commentInput = document.getElementById('comment-input-' + postId);
                    commentInput.style.display = commentInput.style.display === 'none' ? 'block' : 'none';
                    const commentsContainer = document.getElementById('comments-container-' + postId);
                commentsContainer.style.display = commentsContainer.style.display === 'none' ? 'block' : 'none';
                });
            });
        });


        document.addEventListener('DOMContentLoaded', function () {
    const editPostButtons = document.querySelectorAll('.edit-post-btn');

    editPostButtons.forEach(button => {
        button.addEventListener('click', function () {
            const postId = this.getAttribute('data-post-id');
            const postData = JSON.parse(this.getAttribute('data-post')); // Parse the JSON data
            // Populate modal fields with post data
            document.getElementById('editPostId').value = postData['ID'];
            document.getElementById('editPostTitle').value = postData['title'];
            document.getElementById('editPostContent').value = postData['Content'];
            document.getElementById('currentPostImage').setAttribute('src', 'uploads/' + postData['image']); // Update image src
        });
    });
});
</script>
        <!-- Blog End -->

        <!-- Reclamation debut  -->
        <div class="container-fluid subscribe py-5">
    <div class="container text-center py-5">
        <div class="mx-auto text-center" style="max-width: 900px;">
            <h5 class="subscribe-title px-3">Subscribe</h5>
            <h1 class="text-white mb-4">put your Reclamation</h1>
            <p class="text-white mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum tempore nam, architecto doloremque velit explicabo? Voluptate sunt eveniet fuga eligendi! Expedita laudantium fugiat corrupti eum cum repellat a laborum quasi.</p>
            <form id="reclamationForm" action="createRecl.php" method="post" onsubmit="return validateForm(event)" enctype="multipart/form-data">
    <div class="position-relative mx-auto">
        <input id="messageInput" class="form-control border-primary rounded-pill w-100 py-3 ps-4 pe-5 mb-3" type="text" name="message" placeholder="enter Your message please eleborate">
        <input id="sujetInput" class="form-control border-primary rounded-pill w-100 py-3 ps-4 pe-5 mb-3" type="text" name="sujet" placeholder="Subject of the issue">
        <input id="fileInput" class="form-control border-primary rounded-pill w-100 py-3 ps-4 pe-5 mb-3" type="file" name="file">
        <button type="submit" class="btn btn-primary rounded-pill py-2 px-4">Submit</button>
    </div>
</form>
        </div>
    </div>
</div>
        <!-- Subscribe End -->

        <!-- Footer Start -->
        <div class="container-fluid footer py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Get In Touch</h4>
                            <a href=""><i class="fas fa-home me-2"></i> 123 Street, New York, USA</a>
                            <a href=""><i class="fas fa-envelope me-2"></i> info@example.com</a>
                            <a href=""><i class="fas fa-phone me-2"></i> +012 345 67890</a>
                            <br>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-share fa-2x text-white me-2"></i>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Company</h4>
                            <a href=""><i class="fas fa-angle-right me-2"></i> About</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> home</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Blog</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> activities</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> shop </a>
                           
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Support</h4>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Contact</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Legal Notice</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Privacy Policy</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Terms and Conditions</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Sitemap</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Cookie policy</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item">
                            <div class="row gy-3 gx-2 mb-4">
                                <div class="col-xl-6">
                                    <form>
                                        <div class="form-floating">
                                            <select class="form-select bg-dark border" id="select1">
                                                <option value="1">Arabic</option>
                                                <option value="2">German</option>
                                                <option value="3">Greek</option>
                                                <option value="3">New York</option>
                                            </select>
                                            <label for="select1">English</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-xl-6">
                                    <form>
                                        <div class="form-floating">
                                         
                                           
                                        </div>
                                    </form>
                                </div>
                            </div>
                 
        <!-- Footer End -->
        
        <!-- Copyright Start -->
        <div class="container-fluid copyright text-body py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-end mb-md-0">
                        <i class="fas fa-copyright me-2"></i><a class="text-white" href="#">Your Site Name</a>, All right reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-start">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="text-white" href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script>
    function validateForm(event) {
        event.preventDefault();

// Get form inputs
var messageInput = document.getElementById('messageInput');
var sujetInput = document.getElementById('sujetInput');
var fileInput = document.getElementById('fileInput');

// Validate message input (required)
if (!messageInput.value.trim()) {
    alert('Please enter your message');
    messageInput.focus();
    return false;
}

// Validate sujet input (required)
if (!sujetInput.value.trim()) {
    alert('Please enter the subject of the issue');
    sujetInput.focus();
    return false;
}

// Validate file input (optional)
if (fileInput.value.trim() && !/\.(jpg|jpeg|png)$/i.test(fileInput.value)) {
    alert('Please select a valid image file (jpg, jpeg, or png)');
    fileInput.value = '';
    fileInput.focus();
    return false;
}

// Submit the form if all inputs are valid
document.getElementById('reclamationForm').submit();
    }

       
</script>

       
    </body>

</html>