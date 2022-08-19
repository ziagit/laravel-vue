up:
	docker-compose  up  --remove-orphans
build:
	docker-compose  up --build --remove-orphans
node:
	if [! -f node_modules]; then npm install; fi && \
	npm run watch
php-bash:
	docker exec -it $$(docker ps | grep moving-php | awk '{print $$1}') /bin/bash
node-bash:
	docker exec -it $$(docker ps | grep moving-node | awk '{print $$1}') /bin/bash

mysql-bash:
	docker exec -it $$(docker ps | grep moving_mysql | awk '{print $$1}') /bin/bash

