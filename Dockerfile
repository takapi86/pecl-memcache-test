FROM centos:7
RUN yum -y update && yum -y install php php-fpm php-pecl-memcache

CMD php-fpm
