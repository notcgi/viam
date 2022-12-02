echo Hi, VIAM!
if [ -f ".env" ];
then
  echo Skip creating .env
else
  cp .env.example .env
fi
docker compose up -d
docker compose exec php php yii migrate
echo Go to: http://localhost