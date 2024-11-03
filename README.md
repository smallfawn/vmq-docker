```yml
version: '3.8'
services:
  vmq:
    image: dockerproxy.net/smallfawn/vmq
    container_name: vmq
    network_mode: "host"
    volumes:
      - ./set.conf:/vmq/set.conf
```
```
搭建完毕后使用 IP:1152打开页面  如果端口备用了那么就自己修改
```
```conf
DB_HOST=127.0.0.1 #数据库地址
DB_NAME=vmq #数据库名
DB_USER=root #数据库用户名
DB_PASSWORD=aaa #数据库密码
DB_PORT=3306 #数据库端口
```