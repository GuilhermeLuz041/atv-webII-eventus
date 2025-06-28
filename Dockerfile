# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instala dependências e extensões PHP necessárias para o Laravel
RUN apt-get update && apt-get install -y \
    zip unzip curl libpng-dev libonig-dev libxml2-dev \
    libzip-dev libcurl4-openssl-dev pkg-config git \
    && docker-php-ext-install pdo_mysql mbstring zip gd

# Ativa o mod_rewrite do Apache (para URLs amigáveis do Laravel)
RUN a2enmod rewrite

# Altera o DocumentRoot do Apache para a pasta /public do Laravel
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Adiciona configuração extra para permitir .htaccess e acesso ao public/
RUN echo '<Directory /var/www/html/public>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/apache2.conf

# Copia os arquivos do projeto Laravel para dentro do container
COPY . /var/www/html

# Define permissões adequadas para o Apache acessar os arquivos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html
