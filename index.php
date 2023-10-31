<?php
include './inc/connection.php';
include './inc/form.php';
include './inc/select.php';
include './inc/db_close.php';

?>

<?php include_once './parts/header.php'; ?>

<div class="container">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Programming Contest</h1>
            <div class="content-wrapper">
                <p class="col-md-8 fs-4">Join the ultimate programming challenge and show your coding skills. Compete with fellow developers in this high-stakes coding contest. Test your problem-solving abilities, algorithmic understanding, and coding speed. Are you up for the challenge?</p>
                <div class="col-md-5">
                    <img src="./images/team.png" alt="TeamCodeImage" class="image">
                </div>
            </div>
            <p class="col-md-8 fs-4">Remaining Time for Registration</p>
            <h3 class="col-md-8 fs-4" id="counter"></h3>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item"><b>Welcome to the Programming Contest</b></li>
        <li class="list-group-item list-group-item-primary">Register and let us choose a teammate for you</li>
        <li class="list-group-item list-group-item-secondary">Start practicing with your teammate</li>
        <li class="list-group-item list-group-item-success">Collaborate and solve coding challenges</li>
        <li class="list-group-item list-group-item-danger">Compete to improve your coding skills</li>
        <li class="list-group-item list-group-item-warning">Win exciting prizes and recognition</li>
        <li class="list-group-item list-group-item-info">Stay tuned for contest updates</li>
        <li class="list-group-item list-group-item-light">Have fun and code your way to success</li>
        <li class="list-group-item list-group-item-dark">Thank you for participating!</li>
    </ul>

    <div class="p-5 mb-4 bg-light rounded-3 text-center">
        <div class="container-fluid py-0">
            <form class="mt-5" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <h3>Fill in your information</h3><br><br>
                <div class="mb-3">
                    <input type="text" name="firstName" id="firstName" class="form-control" value="<?php echo $firstName; ?>" placeholder="First Name" aria-describedby="firstName">
                    <div class="form-text error"><?php echo $errors['FirstNameError']; ?></div>
                </div>
                <div class="mb-3">
                    <input type="text" name="lastName" id="lastName" class="form-control" value="<?php echo $lastName; ?>" placeholder="Last Name" aria-describedby="lastName">
                    <div class="form-text error"><?php echo $errors['LastNameError']; ?></div>
                </div>
                <div class="mb-3">
                    <input type="text" name="email" id="email" class="form-control" value="<?php echo $email; ?>" placeholder="Email Address" aria-describedby="email">
                    <div class="form-text"><?php echo $errors['EmailAddressError']; ?></div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">
                    <h2>Submit</h2>
                </button>
            </form>
        </div>
    </div>

    <div id="loader-container" class="loader-container">
        <div id="loader">
            <canvas id="circularLoader" width="200" height="200"></canvas>
        </div>
    </div>


    <!-- Button trigger modal -->
    <div class="row col-12 gap-2 d-grid mx-auto">
        <button type="button" id="teammate" class="btn btn-primary">
            <h1>Randomly Choose your Teammate</h1>
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Your Teammate is:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="cards" class="row mb-5 pb-5 display-1 text-center ">
                        <?php foreach ($users as $user) : ?>
                            <div class="">
                                <div class="card my-2 bg-light">
                                    <div class="card-body">
                                        <h3><?php echo htmlspecialchars($user['firstName'] . ' ' . htmlspecialchars($user['lastName'])); ?><br></h3>
                                        <h3><?php echo htmlspecialchars($user['email']); ?><br></h3>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>




</div>
<?php include_once './parts/footer.php';  ?>