# PHP API - CRUD

A micro REST API application, that simply does execute CRUD (create, read, update, and delete) actions.
> **Note:** This application was created using plain PHP with a couple of third-party libraries including [Doctrine DBAL](https://www.doctrine-project.org/projects/dbal.html) and [phpdotenv](https://github.com/vlucas/phpdotenv) for configuring database connection.

## Installation
To install, you simply clone this repository:

```shell  
$ git clone https://github.com/MorganGonzales/php_api_crud
```

Then install its dependencies using [Composer](https://getcomposer.org/).

```shell  
$ composer install
```

Afterwards, initilize your database using the `board_games.sql` provided in the repository.
Finally, copy `.env-example` as `.env` with the proper database configuration parameters set.


## API Endpoints
### Create
**URL:** http://your-host/api/board-games/create.php
**Action:** POST
**Sample Body:**
```json
{
  "name":"Pandemic",
  "short_description":"Your team of experts must prevent the world from succumbing to a viral pandemic.",
  "description":"In Pandemic, several virulent diseases have broken out simultaneously all over the world! The players are disease-fighting specialists whose mission is to treat disease hotspots while researching cures for each of four plagues before they get out of hand.",
  "year_published":"2008",
  "designer":"Matt Leacock",
  "publisher":"Z-Man Games, Inc."
}
```

### Read
**URL:** http://your-host/api/board-games/read.php
**Action:** GET

### Update
**URL:** http://your-host/api/board-games/update.php
**Action:** PUT
**Sample Body:**
```json
{
  "id":"4",
  "name":"Pandemic Iberia",
  "short_description":"Your team of experts must prevent the world from succumbing to a viral pandemic.",
  "description":"In Pandemic, several virulent diseases have broken out simultaneously all over the world! The players are disease-fighting specialists whose mission is to treat disease hotspots while researching cures for each of four plagues before they get out of hand.",
  "year_published":"2008",
  "designer":"Matt Leacock",
  "publisher":"Z-Man Games, Inc."
}
```

### Delete
**URL:** http://your-host/api/board-games/delete.php
**Action:** DELETE
**Sample Body:**
```json
{
  "id":"4",
}
```

### Search
**URL:** http://your-host/api/board-games/search.php
**Action:** POST
**Sample Body:**
```json
{
  "designer":"Matt Leacock",
}
```
