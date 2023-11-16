<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Codeigniter 4 Search</title>
    <style>
        /* Add Bootstrap pagination styles manually */
        .pagination {
            display: flex;
            padding-left: 0;
            list-style: none;
            border-radius: .25rem;
        }
        .pagination > li {
            padding: 10px;
            background: #b8bec3;
        }

        .page-link {
            position: relative;
            display: block;
            padding: .5rem .75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #007bff;
            background-color: #fff;
            border: 1px solid #dee2e6;
        }

        .page-link:hover {
            z-index: 2;
            color: #0056b3;
            text-decoration: none;
            background-color: #e9ecef;
            border-color: #dee2e6;
        }

        .page-item.disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            cursor: auto;
            background-color: #fff;
            border-color: #dee2e6;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">

    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
    }
    ?>
    <!-- app/Views/search_form.php -->

    <!-- app/Views/search_form.php -->

    <form class="form-inline" action="<?= base_url('search') ?>" method="get">
        <div class="form-group mx-sm-3 mb-2">
            <label for="name" class="sr-only">Name:</label>
            <input type="text" class="form-control" name="name" id="name" value="<?= isset($_GET['name']) ? $_GET['name'] : '' ?>" placeholder="Name">
        </div>

        <div class="form-group mx-sm-3 mb-2">
            <label for="email" class="sr-only">Email:</label>
            <input type="text" class="form-control" name="email" id="email" value="<?= isset($_GET['email']) ? $_GET['email'] : '' ?>" placeholder="Email">
        </div>

        <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>


    <div class="mt-3">
        <table class="table table-bordered" id="users-list">
            <thead>
            <tr>
                <th>User Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if($users): ?>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td>
                            <a href="<?php echo base_url('edit-view/'.$user['id']);?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="<?php echo base_url('delete/'.$user['id']);?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">
    <nav aria-label="page navigation">
        <ul class="pagination justify-content-center">
            <?= $pager->links() ?>
        </ul>
    </nav>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>


</body>
</html>