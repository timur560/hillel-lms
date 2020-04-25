<?php

use App\Entity\User;

require_once 'vendor/autoload.php';
require_once 'config/twig.php';
require_once 'config/doctrine.php';

//$users = User::findAll();


$userRepository = $entityManager->getRepository(User::class);

//var_dump($userRepository);

//$users = $userRepository->findAll();

//$user = $userRepository->find(1);

//$users = $userRepository->findOneBy(['email' => 'test@test.com']);

//$users = $userRepository->findBy(['email' => 'test@test.com']);

//$sql = 'select * from users u where id = :id';

//$dql = 'select u from App\Entity\User u where u.id = :id';
//$query = $entityManager->createQuery($dql);
//$query->setParameter(':id', 1);
//$result = $query->execute();


//$qb = $entityManager->createQueryBuilder();
//
//$qb
//    ->select('u')
//    ->from(User::class, 'u')
//    ->where('u.id = :id')
//    ->setParameter(':id', 1)
//    ->setMaxResults(10)
//    ->orderBy('u.id', 'DESC');
//
//$query = $qb->getQuery();
//
//$result = $query->execute();
//
////var_dump($query);
//
//var_dump($result);

//var_dump($users);

//$user = new User();
//$user->setEmail('some@another.com');
//$user->setPassword('444444');
//$user->setCreatedAt(new DateTime());
//$user->setUpdatedAt(new DateTime());
//
//var_dump($user);
//
//$entityManager->persist($user);
//
//$entityManager->flush();
//

$user = $entityManager->getRepository(User::class)->find(1);

$entityManager->remove($user);

$entityManager->flush();
