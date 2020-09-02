<?php

include 'include/autoloader.php';

$view = new View();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['search'] == 'search') {
    $searchInput = prepareForSearching($_POST['emailSearch']);
    $results = $view->searchByEmail($searchInput);
} else {
    $results = $view->showAllUsers();
}

function prepareForSearching($searchInput)
{
    $searchInput = htmlspecialchars(trim($searchInput));
    $searchInput = str_replace('%', '[%]', $searchInput);
    $searchInput = '%' . $searchInput . '%';
    return $searchInput;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>Test</title>
</head>

<body>
    <div class="search-box">
        <form action="test.php" method="post">
            <input type="text" placeholder="Search by email" name="emailSearch">
            <button class="search-button" type=" submit" name="search" value="search">Search</button>
            <a class="reset-link" href="">Show all users</a>
        </form>
    </div>
    <table class="table table-hover table-bordered text-center">
        <thead class="thead-dark">
            <tr>
                <th scope="col">User Id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Created At</th>
            </tr>
        </thead>

        <?php if (!empty($results)) :  ?>
            <tbody>
                <?php foreach ($results as $result) : ?>
                    <tr>
                        <th scope="row"><?= $result['userID']; ?></th>
                        <td><?= $result['fname']; ?></td>
                        <td><?= $result['lname']; ?></td>
                        <td><?= $result['email']; ?></td>
                        <td><?= $result['password']; ?></td>
                        <td><?= $result['createdAt'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
    </table>
<?php else : ?>
    </table>
    <h3 class="text-center">No record</h3>
<?php endif ?>




</body>

</html>