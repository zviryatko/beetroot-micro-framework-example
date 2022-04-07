# Test Application

### Installation

```bash
cp .env.dist .env
docker-compose up -d
docker-compose exec -w /var/www php sh -c 'vendor/bin/doctrine orm:schema-tool:create'
```

And open http://site.localhost
