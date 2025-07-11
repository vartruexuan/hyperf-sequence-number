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

// 拼接key
$number = $driver->getNextKey('a');
var_dump($number); // a3

// 拼接key并填充
$number = $driver->getNextKeyAndPad('a');
var_dump($number); // a0004

```

## 驱动
### db
- 执行迁移
```bash
php bin/hyperf.php migrate  --path=./vendor/vartruexuan/hyperf-sequence-number/src/migrations
```
- 或执行sql
```sql
CREATE TABLE `sequence_number` (
   `key` varchar(50) NOT NULL DEFAULT '',
   `counter` int unsigned NOT NULL DEFAULT '0',
   `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
   `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
   PRIMARY KEY (`key`) USING BTREE
) ENGINE=InnoDB COMMENT='编码计次表';

```

## License

MIT