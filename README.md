<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Project Description
Test Case project for Back End Engineer recruitment at Majoo Indonesia. Display Revenue of sales from the designated Month and implement Login management.

## Stack
- PHP ^7.4 | 8
- Laravel ^8.0 + Fortify (For Login Management)
- MariaDB ^10.5.0 | MySQL

## About Laravel

- [Documentation](https://laravel.com/docs)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Repository Setup

Default URL : http://localhost:8000

## Installation
1. clone the repository
2. Install the dependency using composer
```
composer install
```
3. Create `.env` file by copying it from `.env.example` and set the environment variable value in that file.
4. Generate Laravel application key
```
php artisan key:generate
```
5. Generate JWT Auth Secret
```
php artisan jwt:secret
```
6. Create database and add to .env | default Database = `omzet_report`

7. Run database migration and seeder
```
php artisan migrate:fresh --seeder
```
8. Run Laravel development server
```
php artisan serve
```

# API

> Version 1.0

## Path Table

| Method | Path | Description |
| --- | --- | --- |
| POST | [/login](#postlogin) | Login |
| POST | [/register](#postregister) | Register |
| GET | [/transactions/index](#gettransactionsindex) | Index |
| GET | [/transactions/revenue/monthly](#gettransactionsrevenuemonthly) | Omzet November (Merchant) |

## Reference Table

| Name | Path | Description |
| --- | --- | --- |
| Login | [#/components/schemas/Login](#componentsschemaslogin) |  |
| Data | [#/components/schemas/Data](#componentsschemasdata) |  |
| Register | [#/components/schemas/Register](#componentsschemasregister) |  |
| Data1 | [#/components/schemas/Data1](#componentsschemasdata1) |  |
| Index | [#/components/schemas/Index](#componentsschemasindex) |  |
| Data2 | [#/components/schemas/Data2](#componentsschemasdata2) |  |
| Merchant | [#/components/schemas/Merchant](#componentsschemasmerchant) |  |
| Outlet | [#/components/schemas/Outlet](#componentsschemasoutlet) |  |
| Link | [#/components/schemas/Link](#componentsschemaslink) |  |
| OmzetNovemberMerchant | [#/components/schemas/OmzetNovemberMerchant](#componentsschemasomzetnovembermerchant) |  |
| Data3 | [#/components/schemas/Data3](#componentsschemasdata3) |  |
| OmzetNovemberMerchantOutlet | [#/components/schemas/OmzetNovemberMerchantOutlet](#componentsschemasomzetnovembermerchantoutlet) |  |
| httpBearer | [#/components/securitySchemes/httpBearer](#componentssecurityschemeshttpbearer) |  |

## Path Details

***

### [POST]/login

- Summary  
Login

#### RequestBody

- application/x-www-form-urlencoded

```ts
{
  username: string
  password: string
}
```

#### Responses

- 200 OK

`application/json`

```ts
{
  success: boolean
  data: {
    token: string
    jwt_token: string
    name: string
  }
  message: string
}
```

***

### [POST]/register

- Summary  
Register

#### RequestBody

- application/x-www-form-urlencoded

```ts
{
  name: string
  username: string
  password: string
  confirm_password: string
}
```

#### Responses

- 200 OK

`application/json`

```ts
{
  success: boolean
  data: {
    token: string
    name: string
  }
  message: string
}
```

***

### [GET]/transactions/index

- Summary  
Index

#### Responses

- 200 OK

`application/json`

```ts
{
  current_page: integer
  data: {
    id: integer
    merchant_id: integer
    outlet_id: integer
    bill_total: integer
    created_at: string
    created_by: integer
    updated_at: string
    updated_by: integer
    merchant: {
      id: integer
      user_id: integer
      merchant_name: string
      created_at: string
      created_by: integer
      updated_at: string
      updated_by: integer
    }
    outlet: {
      id: integer
      merchant_id: integer
      outlet_name: string
      created_at: string
      created_by: integer
      updated_at: string
      updated_by: integer
    }
  }[]
  first_page_url: string
  from: integer
  last_page: integer
  last_page_url: string
  links: {
    url: string
    label: string
    active: boolean
  }[]
  next_page_url: string
  path: string
  per_page: integer
  prev_page_url: string
  to: integer
  total: integer
}
```

***

### [GET]/transactions/revenue/monthly

- Summary  
Omzet November (Merchant)

#### Parameters(Query)

```ts
startdate: string
```

```ts
enddate: string
```

#### Responses

- 200 OK

`application/json`

```ts
{
  current_page: integer
  data: {
    created_date: string
    revenue: integer
  }[]
  first_page_url: string
  from: integer
  last_page: integer
  last_page_url: string
  links: {
    url: string
    label: string
    active: boolean
  }[]
  next_page_url: string
  path: string
  per_page: integer
  prev_page_url: string
  to: integer
  total: integer
}
```

## References

### #/components/schemas/Login

```ts
{
  success: boolean
  data: {
    token: string
    jwt_token: string
    name: string
  }
  message: string
}
```

### #/components/schemas/Data

```ts
{
  token: string
  jwt_token: string
  name: string
}
```

### #/components/schemas/Register

```ts
{
  success: boolean
  data: {
    token: string
    name: string
  }
  message: string
}
```

### #/components/schemas/Data1

```ts
{
  token: string
  name: string
}
```

### #/components/schemas/Index

```ts
{
  current_page: integer
  data: {
    id: integer
    merchant_id: integer
    outlet_id: integer
    bill_total: integer
    created_at: string
    created_by: integer
    updated_at: string
    updated_by: integer
    merchant: {
      id: integer
      user_id: integer
      merchant_name: string
      created_at: string
      created_by: integer
      updated_at: string
      updated_by: integer
    }
    outlet: {
      id: integer
      merchant_id: integer
      outlet_name: string
      created_at: string
      created_by: integer
      updated_at: string
      updated_by: integer
    }
  }[]
  first_page_url: string
  from: integer
  last_page: integer
  last_page_url: string
  links: {
    url: string
    label: string
    active: boolean
  }[]
  next_page_url: string
  path: string
  per_page: integer
  prev_page_url: string
  to: integer
  total: integer
}
```

### #/components/schemas/Data2

```ts
{
  id: integer
  merchant_id: integer
  outlet_id: integer
  bill_total: integer
  created_at: string
  created_by: integer
  updated_at: string
  updated_by: integer
  merchant: {
    id: integer
    user_id: integer
    merchant_name: string
    created_at: string
    created_by: integer
    updated_at: string
    updated_by: integer
  }
  outlet: {
    id: integer
    merchant_id: integer
    outlet_name: string
    created_at: string
    created_by: integer
    updated_at: string
    updated_by: integer
  }
}
```

### #/components/schemas/Merchant

```ts
{
  id: integer
  user_id: integer
  merchant_name: string
  created_at: string
  created_by: integer
  updated_at: string
  updated_by: integer
}
```

### #/components/schemas/Outlet

```ts
{
  id: integer
  merchant_id: integer
  outlet_name: string
  created_at: string
  created_by: integer
  updated_at: string
  updated_by: integer
}
```

### #/components/schemas/Link

```ts
{
  url: string
  label: string
  active: boolean
}
```

### #/components/schemas/OmzetNovemberMerchant

```ts
{
  current_page: integer
  data: {
    created_date: string
    revenue: integer
  }[]
  first_page_url: string
  from: integer
  last_page: integer
  last_page_url: string
  links: {
    url: string
    label: string
    active: boolean
  }[]
  next_page_url: string
  path: string
  per_page: integer
  prev_page_url: string
  to: integer
  total: integer
}
```

### #/components/schemas/Data3

```ts
{
  created_date: string
  revenue: integer
}
```

### #/components/schemas/OmzetNovemberMerchantOutlet

```ts
{
  current_page: integer
  data: {
    created_date: string
    revenue: integer
  }[]
  first_page_url: string
  from: integer
  last_page: integer
  last_page_url: string
  links: {
    url: string
    label: string
    active: boolean
  }[]
  next_page_url: string
  path: string
  per_page: integer
  prev_page_url: string
  to: integer
  total: integer
}
```

### #/components/securitySchemes/httpBearer

```ts
{
  "type": "http",
  "scheme": "bearer"
}
```