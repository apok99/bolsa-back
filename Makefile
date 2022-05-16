capitale-db:
	@docker exec -it capitale-db mysql -u capitale -p123123 capitale
bash:
	@docker exec -it capitale-php bash
consume-queue:
	@docker exec -it capitale-php php bin/console messenger:consume async -vv
create-db:
	@docker exec -it capitale-db mysql -u capitale -p123123 -e 'DROP DATABASE IF EXISTS capitale;'
	@docker exec -it capitale-php php bin/console doctrine:database:create
migrate-db:
	@docker exec -it capitale-php php bin/console doctrine:migrations:migrate
diff-db:
	@docker exec -it capitale-php php bin/console make:migration
debug-routes:
	@docker exec -it capitale-php php bin/console debug:router
server-dump:
	@docker exec -it capitale-php php bin/console server:dump
docker-start:
	@UID=$(id -u) GID=$(id -g) docker compose up -d
setup:
	#@UID=$(id -u) GID=$(id -g) docker compose up -d
	@docker exec -it capitale-php composer install
	@cp .env .env.local
	@docker exec -it capitale-php php bin/console lexik:jwt:generate-keypair
	@make create-db
	@make migrate-db
	@echo "Add the real FMP_API_KEY to .env.local and you're done!"