#!/bin/bash

# === CONFIG ===
LOCAL_PATH="/c/xampp/htdocs/casino-ritz"
SERVER_USER="mb8dlocn"
SERVER_HOST="185.45.67.70"
SERVER_PORT="1022"
REMOTE_PATH="~/staging.casino-ritz.eu/public"
SSH_CMD="ssh -p $SERVER_PORT $SERVER_USER@$SERVER_HOST"

# === STEP 1: Go to project directory ===
echo "📂 Navigating to project directory..."
cd "$LOCAL_PATH" || { echo "❌ Project directory not found!"; exit 1; }

# === STEP 2: Build project ===
echo "🧱 Running npm build..."
npm run build || { echo "❌ Build failed!"; exit 1; }

# === STEP 3: Upload build to server ===
echo "🚀 Uploading build files to server..."
scp -P $SERVER_PORT -r public/build/ $SERVER_USER@$SERVER_HOST:$REMOTE_PATH/ || { echo "❌ Upload failed!"; exit 1; }

# === STEP 4: Clear Laravel caches remotely ===
echo "🧹 Clearing Laravel cache on server..."
$SSH_CMD "cd ~/staging.casino-ritz.eu && php artisan optimize:clear"

echo "✅ Deployment complete! All done 🎉"
