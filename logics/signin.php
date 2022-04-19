<?php
    require_once "../data_access/UserRepository.php";   
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userRepository = new UserRepository();
    $user = $userRepository->getByEmail($email);

    header("Content-Type: application/json");
    if($user->password == md5($password))
        echo json_encode($user);
    else
        http_response_code(404);

