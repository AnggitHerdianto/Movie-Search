# mongo
FROM mongo:latest

# timezone
RUN echo "Australia/Perth" > /etc/timezone
RUN rm -f /etc/localtime
RUN dpkg-reconfigure -f noninteractive tzdata

# update repo
RUN apt-get update -y --fix-missing
RUN apt-get upgrade -y 

# install useful tools
RUN apt-get -y install \
    apt-utils \
    net-tools \
    autossh \
    wget \
    nano \
    vim \
    dialog \
    npm \
    git \
    curl \
    openssl \
    unzip \
    zip \
    apt-file \
    pv

# hide debian detail
ARG DEBIAN_FRONTEND=noninteractive

