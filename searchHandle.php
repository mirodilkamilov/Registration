<?php

include 'include/autoloader.php';

$view = new View();
$controller = new Controller();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['emailSearch'])) {
    $searchInput = $controller->prepareForSearching($_POST['emailSearch']);
    $results = $view->searchByEmail($searchInput);
} else {
    $results = $view->showAllUsers();
}

?>

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