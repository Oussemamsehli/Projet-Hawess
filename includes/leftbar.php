<nav class="ts-sidebar">
	<ul class="ts-sidebar-menu">

		<li class="ts-label">Main</li>
		<li><a href="profile.php"><i class="fa fa-user"></i> &nbsp;Profile</a>
		</li>
		<li><a href="feedback.php"><i class="fa fa-envelope"></i> &nbsp;Feedback</a>
		</li>
		<li><a href="notification.php"><i class="fa fa-bell"></i> &nbsp;Notification<sup style="color:red">*</sup></a>
		</li>
		<li><a href="messages.php"><i class="fa fa-envelope"></i> &nbsp;Messages</a>
		</li>
		<li><a href="../campings/index.php"><i class="fa fa-envelope"></i> &nbsp;Liste des campings</a>
		</li>
		<li id="adminReclamations" style="display: none;"><a href="/Projet-Hawess/view/back/template/AdminReclamation.php"><i class="fa fa-envelope"></i> &nbsp;Liste des reclamations</a></li>
		<li id="clientReclamations" style="display: none;"><a href="/Projet-Hawess/view/back/template/ClientReclamation.php"><i class="fa fa-envelope"></i> &nbsp;Mes reclamations</a></li>
		<li><a href="/Projet-Hawess/view/front/all_posts.php"><i class="fa fa-envelope"></i> &nbsp;forum</a>
		</li>
	</ul>
	<p class="text-center" style="color:#ffffff; margin-top: 100px;">© hawess</p>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to fetch user details by ID
        async function getUserById(userId) {
            try {
                const response = await fetch(`/Projet-Hawess/includes/getUserById.php?userId=${userId}`);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const user = await response.json();
                return user;
            } catch (error) {
                console.error('Error fetching user:', error);
                return null;
            }
        }

        // Get user ID from localStorage
        var userId = localStorage.getItem('userId');

        // Call getUserById and update navigation based on user type
        if (userId) {
            getUserById(userId)
                .then(user => {
                    if (user && user.type === 'admin') {
                        document.getElementById('adminReclamations').style.display = 'block';
						document.getElementById('clientReclamations').style.display = 'none';
                    } else {
                        document.getElementById('adminReclamations').style.display = 'none';
						document.getElementById('clientReclamations').style.display = 'block';
                    }
                })
                .catch(error => {
                    console.error('Error fetching user:', error);
                });
        }
    });
</script>