## Getting Started

#### To run the project all you have to do is run the following command

```
bash init.sh
```

#### Then open following link on browser
http://localhost

&nbsp;

> :warning: **An error has occurred?**

#### Run the following commands one by one

```
cp .env.example .env
```

```
composer install
```

```
./vendor/bin/sail up -d
```

```
./vendor/bin/sail php artisan key:generate
```

```
./vendor/bin/sail php artisan migrate
```

```
./vendor/bin/sail php artisan ide-helper:generate
```

```
./vendor/bin/sail php artisan ide-helper:models --write-mixin
```
