# hyperf-sequence-number

[![php](https://img.shields.io/badge/php-%3E=8.1-brightgreen.svg?maxAge=2592000)](https://github.com/php/php-src)
[![Latest Stable Version](https://img.shields.io/packagist/v/vartruexuan/hyperf-sequence-number)](https://packagist.org/packages/vartruexuan/hyperf-sequence-number)
[![License](https://img.shields.io/packagist/l/vartruexuan/hyperf-sequence-number)](https://github.com/vartruexuan/hyperf-sequence-number)

# 概述
hyperf 编码计次组件

### 安装组件

```shell
composer require vartruexuan/hyperf-sequence-number
```

### 构建配置

```shell
php bin/hyperf.php vendor:publish vartruexuan/hyperf-sequence-number
```

## 🛠 使用

```php
// 实际使用使用依赖注入
$container = ApplicationContext::getContainer();
$driver = $container->get(DriverInterface::class);

// 直接获取计次编码
$number = $driver->getNext('a');
var_dump($number); // 1

// 获取编码并填充指定长度
$number = $driver->getNextAndPad('a');
var_dump($number); // 0002

```
