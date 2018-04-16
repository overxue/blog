
## 项目概述

这是我的个人博客，使用 [laravel5.5](https://laravel.com/) 和 [vue2.0](https://cn.vuejs.org/) 编写而成，小程序版请访问 [mpblog](https://github.com/overxue/mpblog)。

博客的后台采用 [element-ui](http://element-cn.eleme.io/)，目前只实现发帖功能，后台我还在更新中。

后续我会不断完善这个博客，添加一些新的功能，比如文章评论，点赞，分享朋友圈。欢迎小伙伴关注。

如果你发现bugs，或者有一些好的建议，欢迎 issue。

## PC端截图展示
<p>
  <img alt="博文列表" src="http://p5vnm2kox.bkt.clouddn.com/github/pcblog.jpg" />
  <img alt="博文详情" src="http://p5vnm2kox.bkt.clouddn.com/github/pcdetail.jpg" />
</p>

## 移动端截图展示
<p>
  <img alt="博客首页" src="http://p5vnm2kox.bkt.clouddn.com/github/mobile-index.jpg" width="32%" />
  <img alt="博文列表" src="http://p5vnm2kox.bkt.clouddn.com/github/mobile-blog.jpg" width="32%"/>
  <img alt="博文详情" src="http://p5vnm2kox.bkt.clouddn.com/github/mobile-detail.png" width="32%" />
</p>

## 运行环境要求

- Nginx 1.8+
- PHP 7.1+
- Mysql 5.7+
- Redis 3.0+
- Memcached 1.4+

## 开发环境部署/安装

本项目代码使用 PHP 框架 [Laravel 5.5](https://d.laravel-china.org/docs/5.5/) 开发，本地开发环境使用 [Laravel Homestead](https://d.laravel-china.org/docs/5.5/homestead)。

下文将在假定读者已经安装好了 Homestead 的情况下进行说明。如果您还未安装 Homestead，可以参照 [Homestead 安装与设置](https://laravel-china.org/docs/5.5/homestead#installation-and-setup) 进行安装配置。

### 基础安装

#### 1. 克隆`blog`源代码

```
git clone git@github.com:overxue/blog.git
```

1). 运行以下命令编辑 Homestead.yaml 文件：

```shell
vi Homestead.yaml
```

2). 加入对应修改，如下所示：

```
folders:
    - map: ~/my-path/blog/ # 你本地的项目目录地址
      to: /home/vagrant/blog/

sites:
    - map: blog.test
      to: /home/vagrant/blog/public

databases:
    - blog
```

3). 重启Homestead

```shell
homestead reload --provision
```

4). 修改本地 hosts 文件

添加 `blog.test` 到hosts文件中

#### 3. 安装扩展包依赖

    composer install

#### 4. 生成配置文件

```
cp .env.example .env
```

### 5. 修改.env中以下变量

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
 
#### 5. 生成秘钥

```shell
php artisan key:generate
```

#### 6. 生成JWT的secret

```shell
php artisan jwt:secret
```

#### 7. 生成数据表及测试数据

```shell
$ php artisan migrate --seed
```

#### 8. 修改 blog/resources/assets/js/api/config.js

```
把文件中的域名修改成hosts文件配置好的域名，默认是 'http://blog.test'
```

### 前端框架安装

1). 安装前端所需要的依赖

```shell
yarn install
```

2). 编译前端内容

```shell
// 运行所有 Mix 任务...
npm run dev
```

### 链接入口

* 首页地址：http://blog.test/
* 管理后台：http://blog.test/admin

管理员账号密码如下:

```
username: 409771385@qq.com
password: xuecong
```

至此, 安装完成 ^_^。
