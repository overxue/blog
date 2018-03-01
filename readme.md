# 要求

1. PHP >= 7.1
2. MySQL >= 5.7
3. Redis

# 项目安装

1. 创建数据库 `blog` (或者其它名称)
2. 创建ENV文件：`cp .env.example .env`
3. 安装依赖： `composer install -vvv`
4. 修改 .env 中以下变量：

   ```
   # 数据库部分
   DB_HOST
   DB_PORT
   DB_DATABASE
   DB_USERNAME
   DB_PASSWORD

   #dingo api
   API_STANDARDS_TREE=prs
   API_SUBTYPE=blog
   API_PREFIX=api
   API_VERSION=v1
   API_DEBUG=true
   ```
5. 设置一下JWT的secret: `php artisan jwt:secret`
6. 生成应用秘钥: `php artisan php artisan key:generate`
7. 建立数据库：`php artisan migrate`
8. 生成假数据: `php artisan db:seed`
