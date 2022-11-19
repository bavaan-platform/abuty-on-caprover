FROM ghcr.io/premoweb/alpine-nginx-php7.3:latest
USER root
COPY src/ /var/www/html/
RUN chown -R nobody.nobody /var/www/html
USER nobody
CMD [ "/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf" ]