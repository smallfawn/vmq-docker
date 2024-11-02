#!/bin/bash  
  
# 启动 Nginx  
service nginx start  
  
# 启动 PHP-FPM  
php-fpm7.4 --nodaemonize  
  
# 注意：这个脚本可能会因为基础镜像的不同而需要调整。  
# 有些 PHP 镜像可能不包含 'service' 命令，或者 PHP-FPM 的启动方式可能不同。  
# 你可能需要根据实际情况调整这个脚本。