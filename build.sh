docker buildx build \
  --platform linux/amd64 \
  -f Dockerfile \
  -t yobistudio/ablegroup-webhook-logger-app:latest \
  . --push
