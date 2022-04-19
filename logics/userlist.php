<?php  
    require_once "../data_access/UserRepository.php";  

    $userRepository = new UserRepository();
    $users = $userRepository->getAll();

    header("Content-Type: application/json");
    echo json_encode($users);