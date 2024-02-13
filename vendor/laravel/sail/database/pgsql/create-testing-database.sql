SELECT 'CREATE DATABASE "academy-laravel"'
WHERE NOT EXISTS (SELECT FROM pg_database WHERE datname = 'academy-laravel')\gexec
