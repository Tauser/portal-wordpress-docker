FROM wordpress:5.1.1-php7.2

LABEL version="1.2.0"
LABEL description="WordPress development environment with Xdebug"

COPY ./html .
RUN chmod -R 777 .
# RUN chmod -R 777 .
# RUN chmod -R 777 wp-content/uploads
# RUN chmod -R 777 wp-content/uploads/midias
# RUN chmod -R 777 wp-content/uploads/midias/audios
# RUN chmod -R 777 wp-content/uploads/midias/videos

ENV http_proxy http://10.251.12.128:3128
ENV https_proxy http://10.251.12.128:3128

ENV XDEBUG_PORT 9000

RUN apt-get update && apt-get install less -y \
    && pear config-set http_proxy http://10.251.12.128:3128 \
    && pecl install xdebug-2.7.0RC2 \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=1" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.profiler_enable=1" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.profiler_output_name=cachegrind.out.%t" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.profiler_output_dir=/tmp" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "max_input_vars=2000" >> /usr/local/etc/php/conf.d/custom.ini \
    && rm -rf /usr/local/etc/php/conf.d/opcache-recommended.ini

RUN set -x \
	&& apt-get update \
	&& apt-get install -y libldap2-dev \
	&& rm -rf /var/lib/apt/lists/* \
	&& docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ \
	&& docker-php-ext-install ldap \
	&& apt-get purge -y --auto-remove libldap2-dev



EXPOSE 9000