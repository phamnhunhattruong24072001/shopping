2. cd docker_shopping
   - run            "docker compose build --no-cache"
   - run            "docker compose up -d"
   - run command    "docker exec -it laravel_shopping bash"
   - run            "composer i" or "composer u"
   - run            "cp .env.example .env"
   - run            "php artisan key:generate"
   - run            "php artisan jwt:secret"
   - run            "docker exec -it vite_docker sh"
   - run            "npm i"
   - run            "npm run dev"
3. Set up .env
    - DB_CONNECTION=mysql
    - DB_HOST=db-shopping
    - DB_PORT=3306
    - DB_DATABASE=shopping
    - DB_USERNAME=root
    - DB_PASSWORD=root