# 使用 php-nginx:7.4-alpine 作为基础镜像  
FROM ioiox/php-nginx:7.4-alpine  
  

WORKDIR /vmq  
  

COPY ./main .  
  


COPY ./nginx.conf /etc/nginx/conf.d/default.conf  
  

EXPOSE 80
# 启动 Nginx 和 PHP-FPM 服务  
CMD ["nginx", "-g", "daemon off;"]