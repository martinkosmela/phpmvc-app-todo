FROM mysql:5.7

#init file - takes 20 seconds to init
#COPY /schemas/schema.sql /docker-entrypoint-initdb.d/schema.sql

#init directory
COPY /schemas/init_mysql /var/lib/mysql
