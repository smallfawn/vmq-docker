# 使用官方的 PHP 7.4 FPM 镜像作为基础镜像  
FROM php:7.4-fpm  
  
# 安装 Nginx 和一些必要的 PHP 扩展  
RUN apt-get update && apt-get install -y \  
    nginx \  
    libzip-dev \  
    zip \  
    unzip \  
    && docker-php-ext-install zip exif \  
    && rm -rf /var/lib/apt/lists/*  
  
# 复制自定义的 nginx 配置文件  
#COPY nginx.conf /etc/nginx/nginx.conf  
COPY default.conf /etc/nginx/conf.d/default.conf  
  
# 设置工作目录  
WORKDIR /var/www/html  
  
# 复制 PHP 应用程序代码到工作目录  
# 假设您有一个名为 'main' 的目录，其中包含您的 PHP 应用代码  
COPY main/ /var/www/html  
  
# 确保 Nginx 可以访问 PHP 应用代码的公共目录  
RUN ln -s /var/www/html/public /var/www/html/public  
  
# 暴露端口  
EXPOSE 80  
  
# 设置环境变量，确保 PHP-FPM 监听在正确的地址和端口上  
ENV PHP_FPM_LISTEN=127.0.0.1:9000  
  
# 启动脚本，用于启动 Nginx 和 PHP-FPM  
COPY entrypoint.sh /entrypoint.sh  
RUN chmod +x /entrypoint.sh  
  
# 使用自定义的 entrypoint 脚本来启动服务  
ENTRYPOINT ["/entrypoint.sh"]