```yml
services:
  vmq:
    image: yanyu.icu/smallfawn/vmq
    container_name: vmq
    ports:
      - "1152:1152"  # 宿主机端口:容器内端口
    volumes:
      - ./set.conf:/vmq/set.conf

```
```
搭建完毕后使用 IP:1152打开页面  如果端口备用了那么就自己修改
```
```conf
DB_HOST=172.X.0.1 #宿主机ip addr show docker0 
DB_NAME=vmq
DB_USER=root
DB_PASSWORD=password
DB_PORT=3306
```