# WordPress base with Dotenv

Basic WordPress layout with [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv), derived from the [WordPress Skeleton](https://github.com/markjaquith/WordPress-Skeleton).

This repo is created solely for evaluating the use of `.env` configuration with WordPress and it is by no means production proof at its current stage, so please avoid using it in an environment other than development.

Since they are generally not considered thread-safe, as emphasized in both [Laravel's](https://github.com/vlucas/phpdotenv/commit/ffcaf1dfee56c8830d83d9812efad2a98c08f02e#diff-b335630551682c19a781afebcf4d07bf978fb1f8ac04c6bf87428ed5106870f5) and [Symphony's](https://github.com/symfony/recipes/pull/156) dotenv implementations, using `.env` files (especially with `getenv()`) for configurations in production is highly discouraged. That in mind, you might want to ditch `.env` altogether in production anyways.