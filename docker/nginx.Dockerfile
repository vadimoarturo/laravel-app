FROM nginx
ADD docker/conf/test.conf /etc/nginx/conf.d/default.conf
COPY docker/ssl/* /var/
WORKDIR /var/www/web-site
RUN chown -R www-data:www-data /var/www/web-site
ENV TZ=Europe/Moscow
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
