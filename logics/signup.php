<?php
    require_once "../data_access/UserRepository.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];

    $user = new User(0, $email, $password, $fullname);

    $userRepository = new UserRepository();
    $user = $userRepository->add($user);

    header("Content-Type: application/json");
    echo json_encode($user);

