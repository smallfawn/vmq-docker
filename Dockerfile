FROM alpine:3.13
LABEL maintainer="sudo@dov.moe"
# Install required packages
RUN apk --no-cache add bash php7 php7-fpm php7-opcache php7-mysqli php7-json php7-openssl php7-curl \
    php7-zlib php7-xml php7-phar php7-intl php7-dom php7-xmlreader php7-ctype php7-session \
    php7-zip php7-fileinfo php7-bcmath php7-tokenizer php7-xmlwriter php7-pcntl php7-simplexml \
    php7-mbstring php7-gd php7-redis php7-pdo php7-pdo_mysql php-iconv nginx

RUN adduser -D -g '' application && mkdir -p /run/nginx
# 复制自定义的 nginx 配置文件（假设 nginx.conf 是完整配置）
#COPY nginx.conf /etc/nginx/nginx.conf  
# 如果使用 conf.d 方式，确保 default.conf 内容完整且正确
COPY default.conf /etc/nginx/conf.d/default.conf  

# 设置工作目录
WORKDIR /vmq


COPY main/ /vmq
RUN chown -R application /vmq
RUN chmod -R 0755 /vmq
CMD ["sh", "-c", "php-fpm7 && nginx -g 'daemon off;'"]