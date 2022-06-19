database-provision:
	docker exec mongo bash -c './database/import.sh localhost'

laravel-up:
	docker-compose -f golang/docker-compose.yml up -d

javascript-up:
	docker-compose -f javascript/docker-compose.yml up -d

db-up:
	docker-compose -f docker-compose.yml up -d

db-restart:
	docker stop mysql-tupausanecesaria
	docker rm mysql-tupausanecesaria
	docker rmi mysql-tupausanecesaria
	make db-up

app-up:
	make laravel-up
	make database-provision