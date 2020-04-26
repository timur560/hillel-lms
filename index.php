<?php

use App\Entity\User;

require_once 'vendor/autoload.php';
require_once 'config/twig.php';
require_once 'config/doctrine.php';

//$phone = new \App\Entity\Phone();
//
//$phone->setPhone('957394875');
//$phone->setCreatedAt(new DateTime());
//$phone->setUpdatedAt(new DateTime());
//
///** @var User $user */
//$user = $entityManager->getRepository(User::class)->find(1);
//
//$user->getPhones()->add($phone);
//$phone->setUser($user);
//
//$entityManager->persist($phone);
//$entityManager->persist($user);
//$entityManager->flush();
//
//var_dump($user, $phone);


/** @var User $user */
$user = $entityManager->getRepository(User::class)->find(1);

// var_dump($user->getPhones());

foreach ($user->getPhones() as $phone) {
    var_dump($phone);
}

$user->getPhones()->removeElement($phone);
$phone->setUser(null);

