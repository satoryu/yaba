FROM php:7.1-cli

## Install tools required for testing the app on CircleCI
# Ref. https://circleci.com/docs/2.0/custom-images/#adding-required-and-custom-tools-or-files
RUN apt-get update && \
    apt-get install -y \
        git \
        ssh \
        tar \
        gzip \
        ca-certificates

## Install sqlsrv and pdo_sqlsrv
# Ref. https://github.com/Microsoft/msphpsql/wiki/Install-and-configuration#docker-files
# Add Microsoft repo for Microsoft ODBC Driver 13 for Linux
RUN apt-get update && apt-get install -y \
    apt-transport-https \
    && curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
    && curl https://packages.microsoft.com/config/debian/8/prod.list > /etc/apt/sources.list.d/mssql-release.list \
    && apt-get update

# Install Dependencies
RUN ACCEPT_EULA=Y apt-get install -y \
    unixodbc \
    unixodbc-dev \
    mssql-tools \
    libgss3 \
    odbcinst \
    msodbcsql \
    locales \
    && echo "en_US.UTF-8 UTF-8" > /etc/locale.gen && locale-gen

# Install pdo_sqlsrv and sqlsrv from PECL. Replace pdo_sqlsrv-4.1.8preview with preferred version.
RUN pecl install pdo_sqlsrv-4.1.8preview sqlsrv-4.1.8preview \
    && docker-php-ext-enable pdo_sqlsrv sqlsrv

RUN mkdir /app

WORKDIR /app

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host", "0.0.0.0"]
