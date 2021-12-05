# Requirements
- docker (for Windows and MacOS https://www.docker.com/products/docker-desktop)

# Installation
1. Generate vendor files
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs

```

2. Setup environment
```
./vendor/bin/sail up
```
