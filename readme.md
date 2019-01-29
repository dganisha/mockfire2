## About Mockfire

Mockfire is a free tool that lets you easily mock up APIs, generate custom data, and preform operations on it using RESTful interface. MockAPI is meant to be used as a prototyping/testing/learning tool.

## Getting Started

- Download database [here](https://github.com/dganisha/mockfire2/blob/master/database/mockfire%20.sql).
- Settings Mail in .env .
- Composer install
- PHP artisan key:generate
- Open ``` vendor/fzaninotto/faker/src/Faker/Factory.php ```
- Tambhakn kode ini dibawah ``` $generator->addProvider(new $providerClassName($generator)); ```
  ``` 
  $generator->addProvider(new \Faker\Provider\id_ID\Person($generator));
  $generator->addProvider(new \Faker\Provider\fr_FR\Address($generator));
  $generator->addProvider(new \Faker\Provider\cs_CZ\DateTime($generator));
  $generator->addProvider(new \Faker\Provider\ro_RO\Person($generator));
  $generator->addProvider(new \Faker\Provider\Base($generator)); 
  $generator->addProvider(new \Faker\Provider\Lorem($generator));
  $generator->addProvider(new \Faker\Provider\en_US\Text($generator));
  $generator->addProvider(new \Faker\Provider\DateTime($generator));
  $generator->addProvider(new \Faker\Provider\UserAgent($generator));
  $generator->addProvider(new \Faker\Provider\Payment($generator));
  $generator->addProvider(new \Faker\Provider\Barcode($generator));
  $generator->addProvider(new \Faker\Provider\Miscellaneous($generator));
  $generator->addProvider(new \Faker\Provider\HtmlLorem($generator));
  $generator->addProvider(new \Faker\Provider\ko_KR\Address($generator));
  ```
  Untuk provider lainnya silahkan cari di [sini](https://github.com/fzaninotto/Faker) .

## How To Use
- First, open mockfire dashboard.
- If you have account, monggo login. mun teu aya, register heula..
- In sidebar , click menu [project]().
- Then, Click "+" Add New Project. Input your project name.
- Go to your project.
- In project page, you must create new resource.
- Input your name resource, method resource and schema .
- Schema will be used to generate mock data .
- For add new column schema , click "+" or for delete column schema click "X".
- If you selected object data "Array" , there will be new button "+". click the button for add field for "Array".
- Click "Create" .
- Your New resource has been created . for generate mock data , click "Generate Data". 
- You can access your resource , click name your resource (Resource [Name Resource]) .


