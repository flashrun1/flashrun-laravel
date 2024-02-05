FROM nginx:latest
EXPOSE 8080
#RUN echo "127.0.0.1 flashrun.local localhost" >> /etc/hosts

RUN apt-get update && apt-get install -y vim iputils-ping

WORKDIR /var/www/flashrun

COPY ./conf.d/* /etc/nginx/conf.d