FROM php:7.4-fpm
WORKDIR /var/www/web-site
# Install basic packages and extensions
RUN apt-get update \
  && apt-get install -y zlib1g-dev libzip-dev wget gnupg sendmail \
  && docker-php-ext-install zip opcache

# Install SQL Server extensions
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
RUN curl https://packages.microsoft.com/config/debian/10/prod.list > /etc/apt/sources.list.d/mssql-release.list
RUN apt-get update
RUN ACCEPT_EULA=Y apt-get install -y msodbcsql17 mssql-tools
RUN apt-get install -y unixodbc-dev libgssapi-krb5-2
RUN pecl install sqlsrv
RUN pecl install pdo_sqlsrv
RUN docker-php-ext-enable sqlsrv
RUN docker-php-ext-enable pdo_sqlsrv
ENV TZ=Europe/Moscow
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

ENV SEND="FromLineOverride=YES"
RUN echo $SEND >> /etc/mail/sendmail.conf
RUN touch /usr/local/etc/php/conf.d/mail.ini
ENV EMAILPHP="sendmail_path = /usr/sbin/ssmtp -t"
RUN echo $EMAILPHP  > /usr/local/etc/php/conf.d/mail.ini
