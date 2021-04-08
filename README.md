
Execute:
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install
    
alias sail='bash vendor/bin/sail'

depois 
sail up -d

Vá no browser e acesse:
http://localhost
