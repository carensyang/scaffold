# 简易网站脚手架

- 轻路由框架 slim3.0
- 模板引擎 twig
- 日志 monolog
- 前端模板 bootstrap
- 数据库ORM Doctrine

## 安装
composer install

## 配置
nginx

    server {
        listen 80;
        index index.php;
        access_log  /var/www/log/access.log main;
        error_log   /var/www/log/error.log;
        root /var/www/hosts/ui/public;

        location / {
            try_files $uri $uri/ /index.php$is_args$args;
        }

        location /assets {
            alias /var/www/hosts/uI/public/assets;
        }

        location ~ \.php {
            try_files $uri =404;
            fastcgi_split_path_info ^(.+\.php)(/.+)$;
            include fastcgi_params;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            fastcgi_param SCRIPT_NAME $fastcgi_script_name;
            fastcgi_index index.php;
            fastcgi_pass 127.0.0.1:9000;
        }
    }

