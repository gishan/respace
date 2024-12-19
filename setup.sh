#!/bin/bash

# Exit on errors
set -e

# Update package lists
echo "Updating package lists..."
sudo apt update -y

# Install Git
echo "Installing Git..."
sudo apt install -y git
echo "Git installed successfully."

# Install prerequisites for Docker
echo "Installing prerequisites for Docker..."
sudo apt install -y \
    ca-certificates \
    curl \
    gnupg \
    lsb-release

# Add Docker's official GPG key
echo "Adding Docker GPG key..."
sudo mkdir -p /etc/apt/keyrings
curl -fsSL https://download.docker.com/linux/debian/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg

# Set up Docker repository
echo "Setting up Docker repository..."
echo \
  "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/debian \
  $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null

# Update package lists again
echo "Updating package lists..."
sudo apt update -y

# Install Docker
echo "Installing Docker..."
sudo apt install -y docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
echo "Docker installed successfully."

# Start and enable Docker
echo "Starting and enabling Docker..."
sudo systemctl start docker
sudo systemctl enable docker
echo "Docker service started and enabled."

# Add the current user to the Docker group (optional)
echo "Adding current user to the Docker group..."
sudo usermod -aG docker $USER
echo "Please log out and log back in for the changes to take effect."

# Display versions of Git and Docker
echo "Installed versions:"
git --version
docker --version

echo "Setup completed successfully!"

# Clone the respace repository
git clone https://oauth2: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@github.com/gishan/respace.git

# Install PHP dependencies
sudo apt install -y libpng-dev libjpeg-dev libfreetype6-dev zip unzip git curl composer

sudo apt install curl -y
curl https://raw.githubusercontent.com/creationix/nvm/master/install.sh | bash
source ~/.profile
nvm install 20.9.0
npm install -g yarn

# Install Nginx
sudo apt install nginx
sudo systemctl start nginx
sudo systemctl enable nginx
sudo nginx -t
sudo systemctl reload nginx

# Install postgresql
sudo apt install postgresql postgresql-contrib -y
sudo systemctl start postgresql@13-main
sudo -u postgres psql <<EOF
-- Create the database
CREATE DATABASE my_database
LTER USER postgres PASSWORD 'gishan';
\q
EOF